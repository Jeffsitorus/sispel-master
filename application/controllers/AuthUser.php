<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AuthUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        // Cek session agar tidak bisa kembali ke halaman auth jika terdapat session.
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/home_templates/header', $data);
            $this->load->view('templates/user_templates/navbar', $data);
            $this->load->view('UserAuth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    function Homepage()
    {
        $data['judul'] = 'Homepage';
        $this->load->view('templates/home_templates/header', $data);
        $this->load->view('homepage');
        $this->load->view('templates/home_templates/footer');
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email'     => $user['email'],
                        'role_id'   => $user['id_role'],
                        'id_user'   => $user['id_user'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        redirect('admin');
                    } else if ($user['id_role'] == 2) {
                        redirect('peserta');
                    } else if ($user['id_role'] == 6) {
                        redirect('user/data_peserta');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password yang dimasukan salah !!</div>');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum di aktivasi!!</div>');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!!</div>');
            redirect(base_url());
        }
    }

    function buatAkun()
    {
        $data['judul'] = "Registrasi";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('UserAuth/registrasi');
        $this->load->view('templates/auth_footer');
    }

    function registration()
    {
        // Cek session agar tidak bisa kembali ke halaman auth jika terdapat session.
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->load->model('modelAuth');
        // Form validasi registrasi
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini telah terdaftar !!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|max_length[12]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Registrasi";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('UserAuth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'no_hp'         => htmlspecialchars($this->input->post('no_hp', true)),
                'email'         => htmlspecialchars($email),
                'foto'          => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role'       => 6,
                'is_active'     => 0,
                'date_created'  => time()
            ];
            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            $this->modelAuth->regMembers($data);
            $this->db->insert('user_token', $user_token);
            // Kirim email
            $this->_kirimEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Berhasil Dibuat!, Silahkan Cek Email Anda Untuk Aktivasi!</div>');
            redirect(base_url());
        }
    }

    private function _kirimEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'kamisama.sispel@gmail.com',
            'smtp_pass' => 'ABC5dasar',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'uff-8',
            'newline'   => "\r\n"
        ];
        $this->email->initialize($config);
        $data = array(
            'name' => 'Kamisama',
            'link' => ' ' . base_url() . 'AuthUser/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"',
        );
        $data_reset = array(
            'name' => 'Kamisama',
            'link' => ' ' . base_url() . 'AuthUser/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"',
        );
        $notif = array(
            'name' => 'Kamisama',
        );
        $this->email->from('kamisama.sispel@gmail.com', 'Admin SISPEL');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $link = $this->email->subject('Verifikasi Akun SISPEL');
            $body = $this->load->view('templates/email_template', $data, true);
            $this->email->message($body);
        } else if ($type == 'lupa') {
            $link = $this->email->subject('Reset Password Akun SISPEL');
            $body = $this->load->view('templates/email_template_reset', $data_reset, true);
            $this->email->message($body);
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email  = $this->input->get('email');
        $token  = $this->input->get('token');
        $user   = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    // Jika benar update is_active di tabel user
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    // hapus user token
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . '
                    Telah berhasil di aktivasi, Silahkan Login. </div>');
                    redirect(base_url());
                } else {
                    // fungsi memberi batas waktu aktivasi token
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi Akun gagal ! Token Expired.</div>');
                    redirect(base_url('authuser'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi Akun gagal ! Token salah !</div>');
                redirect(base_url('authuser'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi Akun gagal ! Email salah !</div>');
            redirect(base_url('authuser'));
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah logout</div>');
        redirect(base_url());
    }

    function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Lupa Password";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('UserAuth/lupa_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            // memastikan bahwa email user telah terdaftar dan aktif
            // ambil data user yang email nya telah terdaftar lalu is_active = 1
            $user =  $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            // Jika ada user
            if ($user) {
                // buat token
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_kirimEmail($token, 'lupa');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link berhasil terkirim, silahkan cek email anda untuk reset password.
            </div>');
                redirect(base_url('authuser/lupaPassword'));
            } else {
                //jika tak ada user
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar atau belum aktif !!</div>');
                redirect(base_url('authuser/lupaPassword'));
            }
        }
    }

    function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            // jika ada user
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            // jika ada user_token
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else { //jika tak ada user token
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Token Salah !
                </div>');
                redirect(base_url('authuser'));
            }
        } else {
            // jika tak ada user
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset Password Gagal! Email salah.
            </div>');
            redirect(base_url('authuser'));
        }
    }

    function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('authuser');
        }
        $this->form_validation->set_rules('password1', 'New Password', 'trim|required|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|min_length[4]|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Ubah Password";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('UserAuth/change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password berhasil diubah, silahkan login kembali</div>');
            redirect(base_url('authuser'));
        }
    }

    function blocked()
    {
        $data['judul'] = '404 | Maaf Halaman Yang Anda Tuju Tidak Ada';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('userauth/blocked');
        $this->load->view('templates/auth_footer');
    }
}
/* End of file AuthUser.php */