<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUser');
        $this->load->model('PelatihanModel', 'pelatihan');
        $this->load->library('upload');
    }

    function index()
    {
        if (!$this->session->userdata('email')) {
            redirect(base_url());
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user  = $data['user']['id_user'];
        $data['pelatihan']  = $this->pelatihan->getPelatihan($id_user);
        $data['judul'] = "Peserta";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar_user', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function ubah_profil()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul']  = "Ubah Data Diri";
            $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/user_templates/topbar_user', $data);
            $this->load->view('templates/user_templates/sidebar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $id = $this->input->post('id_user');
            // Cek jika ada gambar yang akan diupload
            if ($_FILES['foto']['name']) {
                $config['upload_path']      = './assets/img/profile/';
                $config['allowed_types']    = 'jpg|png';
                $config['max_size']         = '1024';
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('peserta/ubah_profil', 'refresh');
                } else {
                    $upload     = ['uploadd_data' => $this->upload->data()];
                    $data = [
                        'nama'      => $this->input->post('nama'),
                        'no_ktp'    => $this->input->post('nik'),
                        'alamat'    => $this->input->post('alamat'),
                        'tgl_lahir' => htmlspecialchars($this->input->post('tl')),
                        'jk'        => $this->input->post('jk'),
                        'foto'      => $upload['upload_data']['file_name'],
                    ];
                    $where = array('id_user' => $id);
                    $this->modelUser->updateDataPeserta($where, $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah !!</div>');
                    redirect('peserta/ubah_profil', 'refresh');
                }
            } else {
                $data = [
                    'nama'      => $this->input->post('nama'),
                    'no_ktp'    => $this->input->post('nik'),
                    'alamat'    => $this->input->post('alamat'),
                    'tgl_lahir' => htmlspecialchars($this->input->post('tl')),
                    'jk'        => $this->input->post('jk'),
                ];
                $where = array('id_user' => $id);
                $this->modelUser->updateDataPeserta($where, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah !!</div>');
                redirect('peserta/ubah_profil', 'refresh');
            }
        }
    }

    function ubah_password()
    {
        $data['judul']  = 'Pengaturan';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('oldpassword', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('newpassword', 'Password Baru', 'trim|required|min_length[4]|matches[newpassword_confirm]');
        $this->form_validation->set_rules('newpassword_confirm', 'Konfirmasi Password', 'trim|required|min_length[4]|matches[newpassword]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/user_templates/topbar_user', $data);
            $this->load->view('templates/user_templates/sidebar', $data);
            $this->load->view('user/ubah_password', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $current_password   = $this->input->post('oldpassword');
            $new_password       = $this->input->post('newpassword');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama yang anda masukan salah !!</div>');
                redirect(base_url('user/ubah_password'));
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama !!</div>');
                    redirect(base_url('peserta/ubah_password'));
                } else {
                    // Password OK
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah !!</div>');
                    redirect(base_url('peserta/ubah_password'));
                }
            }
        }
    }
}
