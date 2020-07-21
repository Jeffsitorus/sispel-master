<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUser');
        $this->load->library('upload');
        $this->load->model('PelatihanModel', 'pelatihan');
        $this->load->library('pagination');
    }

    function index()
    {
        if (!$this->session->userdata('email')) {
            redirect(base_url());
        }
        $data['judul'] = "Peserta";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function data_peserta()
    {
        $data['judul'] = "Lengkapi Data Peserta";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/layouttop', $data);
        $this->load->view('user/form_peserta', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function addPeserta()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Lengkapi Data Peserta";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/user_templates/layouttop', $data);
            $this->load->view('user/form_peserta', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            // Cek jika ada gambar yang akan diupload
            if ($_FILES['foto']['name']) {
                $config['upload_path']      = './assets/img/profile/';
                $config['allowed_types']    = 'jpg|png';
                $config['max_size']         = '1024';
                $config['file_name']        = 'img_' . date('Ymd');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error_upload', $error);
                    $data['judul'] = "Lengkapi Data Peserta";
                    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                    $this->load->view('templates/auth_header', $data);
                    $this->load->view('templates/user_templates/layouttop', $data);
                    $this->load->view('user/form_peserta', $data);
                    $this->load->view('templates/user_templates/footer');
                    $this->load->view('templates/auth_footer');
                } else {
                    $upload_data = ['upload_data' => $this->upload->data()];
                    $data = [
                        'nama'      => $this->input->post('nama'),
                        'no_ktp'    => $this->input->post('nik'),
                        'alamat'    => $this->input->post('alamat'),
                        'tgl_lahir' => htmlspecialchars($this->input->post('tl')),
                        'jk'        => $this->input->post('jk'),
                        'foto'      => $upload_data['upload_data']['file_name'],
                        'id_role'   => 2
                    ];
                    $id = $this->input->post('id_user');
                    $where = array('id_user' => $id);
                    $this->modelUser->updateDataPeserta($where, $data, 'user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data anda berhasil ditambahkan !!</div>');
                    redirect(base_url('user/pilih_pelatihan'));
                }
            }
        }
    }

    public function pilih_pelatihan()
    {
        $config['base_url']   = 'http://localhost/go-sispel/user/pilih_pelatihan';
        $config['total_rows'] = $this->pelatihan->countJadwal();
        $config['per_page']   = 6;
        $this->pagination->initialize($config);
        $data['start']        = $this->uri->segment(3);
        $data   = [
            'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'jadwal'      => $this->pelatihan->getDataJadwal($config['per_page'], $data['start']),
            'judul'       => 'Pilih Pelatihan'
        ];
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/layouttop', $data);
        $this->load->view('user/pilih_pelatihan', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    public function detailPelatihan($id)
    {
        $data   = [
            'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul'       => 'Detail Pelatihan'
        ];
        $data['jadwal']   = $this->pelatihan->getDataIdJadwal($id);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/layouttop', $data);
        $this->load->view('user/detail_pelatihan', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function daftarPelatihan($id)
    {
        $data   = [
            'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul'       => 'Detail Daftar Pelatihan'
        ];
        $data['jadwal']   = $this->pelatihan->getDataIdJadwal($id);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/layouttop', $data);
        $this->load->view('user/form_daftar', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function selesai_daftar()
    {
        $no_pelatihan   = $this->pelatihan->noPelatihan();
        $id_user        = $this->input->post('id_user');
        $id_jadwal      = $this->input->post('id_jadwal');
        $tgl_daftar     = $this->input->post('tgl_pendaftaran');
        $program_id     = $this->input->post('program_id');
        $data   =  [
            'no_pelatihan'      => $no_pelatihan,
            'user_id'           => $id_user,
            'jadwal_id'         => $id_jadwal,
            'program_id'        => $program_id,
            'tgl_pendaftaran'   => $tgl_daftar,
        ];
        $this->pelatihan->insertPelatihan($data);
        $this->session->set_flashdata('success', 'Anda berhasil mendaftar pelatihan, Silahkan menunggu konfirmasi yang akan dikirimkan ke gmail anda.');
        redirect('peserta', 'refresh');
    }
}
/* End of file User.php */