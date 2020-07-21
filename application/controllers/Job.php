<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelJob');
        
    }
    

    function index()
    {
        $data['judul'] = 'Portal NeanganGawe';
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('job_post','job_post.id_post = perusahaan.id_perusahaan');
        $data['lowongan'] = $this->db->get()->result_array();

		$this->load->view('blog_templates/blog_header', $data);
		$this->load->view('job_templates/index', $data);
		$this->load->view('blog_templates/blog_footer');
    }

    function loginPage()
    {
        if($this->session->userdata('email'))
        {
            redirect('job/loginPage');
        }

        $data['judul'] = 'Login NeanganGawe';

        $this->load->view('job_templates/header', $data);
        $this->load->view('job_templates/login', $data);
        $this->load->view('job_templates/footer');
    }
    
    function signup()
    {
        $data['judul'] = 'Sign Up NeanganGawe';
    
        $this->load->view('job_templates/header', $data);
        $this->load->view('job_templates/signup', $data);
        $this->load->view('job_templates/footer');
    }

    function loginAuth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('pass');

        $user = $this->db->get_where('perusahaan', ['email' => $email])->row_array();
        if($user){
            if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 5){
                        redirect('job/dashboardPT');
                    } elseif($user['role_id'] == 7) {
                    redirect('job/setupAccount');
                } elseif($user['role_id'] == 8){
                    redirect('job/pelamar');
                }
                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
                    Password yang dimasukan salah !!
                  </div>');
                  redirect(base_url('job/loginpage'));       
                }
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
                Email belum di aktivasi!!
              </div>');
              redirect(base_url('job/loginpage'));
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
            Email belum terdaftar!!
          </div>');
          redirect(base_url('job/loginpage'));
        }
    }

    function registration()
    {
        // Cek session agar tidak bisa kembali ke halaman auth jika terdapat session.
        if($this->session->userdata('email')){
            redirect('job/loginpage');
        }

        $this->load->model('modelJob');
        
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[3]|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass]');
     
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Sign Up";
            $this->load->view('job_templates/header', $data);
            $this->load->view('job_templates/signup', $data);
            $this->load->view('job_templates/footer');
        } else {
            $email = $this->input->post('email',true);
            $full_name = $this->input->post('name');
            $data = [
                'nama' => htmlspecialchars($full_name),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('pass'),PASSWORD_DEFAULT),
                'id_role' => 7,
                'is_active' => 1,
                'date_created' => time()
            ];

            // siapkan token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];

            $this->db->insert('perusahaan',$data);
            // $this->db->insert('user_token',$user_token);

            // Kirim email
            // $this->_kirimEmail($token,'verify');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Akun Berhasil Dibuat!, Silahkan Cek Email Anda Untuk Aktivasi!
          </div>');
            redirect(base_url('job/loginpage'));
        }
    }

    private function _kirimEmail($token,$type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'kamisama.sispel@gmail.com',
            'smtp_pass' => 'ABC5dasar',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'uff-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $data = array(
            'name' => 'Kamisama',
            'link' => ' ' . base_url() . 'job/loginpage/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"',
        );
        $data_reset = array(
            'name' => 'Kamisama',
            'link' => ' ' . base_url() . 'job/loginpage/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"',
        );

        $this->email->from('kamisama.sispel@gmail.com','Admin SISPEL');
        $this->email->to($this->input->post('email'));

        if($type == 'verify') {
            $link = $this->email->subject('Verifikasi Akun SISPEL');
            $body = $this->load->view('job_templates/email_template',$data,true);
            $this->email->message($body);
            
        } else if($type == 'lupa') {
            $link = $this->email->subject('Reset Password Akun SISPEL');
            $body = $this->load->view('job_templates/email_template_reset',$data_reset,true);
            $this->email->message($body);

        } if($this->email->send()) {
            return true;
        } else{
            echo $this->email->print_debugger();
            die;
        }
        
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('perusahaan',['email' => $email])->row_array();
        if($user){
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
            if($user_token){
                if(time() - $user_token['date_created'] < (60*60*24)) {
                    // Jika benar update is_active di tabel user
                    $this->db->set('is_active', 1);
                    $this->db->where('email',$email);
                    $this->db->update('perusahaan');

                    // hapus user token
                    $this->db->delete('user_token',['email' => $email]);
                    $this->session->set_flashdata('message','<div class="alert alert-success text-light" role="alert">' . $email .'
                    Telah berhasil di aktivasi, Silahkan Login. 
                  </div>');
                    redirect(base_url('job/loginpage'));

                } else {
                    // fungsi memberi batas waktu aktivasi token
                    $this->db->delete('perusahaan',['email' => $email]);
                    $this->db->delete('user_token',['email' => $email]);

                    $this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
                    Aktivasi Akun gagal ! Token Expired.
                  </div>');
                    redirect(base_url('job/loginpage'));
                }
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
                Aktivasi Akun gagal ! Token salah !
              </div>');
                redirect(base_url('job/loginpage'));
            }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger text-light" role="alert">
            Aktivasi Akun gagal ! Email salah !
          </div>');
            redirect(base_url('job/loginpage'));
        }
    }

    function setupAccount()
    {
        $data['judul'] = "Lengkapi Data Peserta";
        $data['user'] = $this->db->get_where('perusahaan',['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/auth_header',$data);
        $this->load->view('templates/user_templates/layouttop', $data);
        $this->load->view('job_templates/form_perusahaan', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function addPerusahaan()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|max_length[12]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('website', 'Website', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Lengkapi Data Peserta";
            $data['user'] = $this->db->get_where('perusahaan',['email' => $this->session->userdata('email')])->row_array();
            
            $this->load->view('templates/auth_header',$data);
            $this->load->view('templates/user_templates/layouttop', $data);
            $this->load->view('job_templates/form_perusahaan', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');

        } else {

            $id = $this->input->post('id_perusahaan');

            // Cek jika ada gambar yang akan diupload
            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                $config['upload_path'] = './assets/img/logo_company/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']  = '1024';
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('foto')){
                  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                    $old_image = $data['user']['foto'];
                    if($old_image != 'default.jpg') {
                        unlink(FCPATH. 'assets/img/logo_company/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                }


            $data = [
                'nama_pt' => $this->input->post('nama'),
                'telepon' => $this->input->post('notelp'),
                'keterangan' => $this->input->post('deskripsi'),
                'alamat' => $this->input->post('alamat'),
                'website' => $this->input->post('website'),
                'foto' => $new_image,
                'id_role' => 5
            ];
        }
        
            $where = array('id_perusahaan' => $id);
            $this->modelJob->updateDataPerusahaan($where,$data,'perusahaan');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data anda berhasil ditambahkan !!
        </div>');
            redirect(base_url('job/dashboardPT'));
        }
    }

    function dashboardPT()
    {
        $data['judul'] = "Peserta";
        $data['user'] = $this->db->get_where('perusahaan',['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/auth_header',$data);
        $this->load->view('job_templates/jobTemp/topbar',$data);
        $this->load->view('job_templates/jobTemp/sidebar',$data);
        $this->load->view('job_templates/jobDash/index',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }
    
    function postJob()
    {
        $data['judul'] = "Peserta";
        $data['user'] = $this->db->get_where('perusahaan',['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/auth_header',$data);
        $this->load->view('job_templates/jobTemp/topbar',$data);
        $this->load->view('job_templates/jobTemp/sidebar',$data);
        $this->load->view('job_templates/jobDash/addJob',$data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');

    }

    function publishLowongan()
    {
        // Cek jika ada gambar yang akan diupload
        $upload_foto = $_FILES['foto']['name'];

        if($upload_foto){
            $config['upload_path'] = './assets/img/cover_lowongan/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']  = '1024';
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('foto')){
                $old_image = $data['job_post']['foto'];
                if($old_image != 'default.jpg') {
                    unlink(FCPATH. 'assets/img/coverLowongan/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
            }
            else{
                $error = array('error' => $this->upload->display_errors());
            }


        $data = [
            'judul' => $this->input->post('lowongan'),
            'kategori' => $this->input->post('kategori'),
            'lokasi' => $this->input->post('lokasi'),
            'salary' => $this->input->post('gaji'),
            'type_job' => $this->input->post('jenis'),
            'content' => $this->input->post('content'),
            // 'foto' => $new_image
        ];
    }
        $this->db->insert('job_post',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Data anda berhasil ditambahkan !!
    </div>');
        redirect(base_url('job/dashboardPT'));
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Anda telah logout
      </div>');
        redirect(base_url('job/loginpage'));
    }

}
/* End of file filename.php */