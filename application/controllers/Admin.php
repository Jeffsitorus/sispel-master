<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelAdmin');
        $this->load->model('PelatihanModel', 'pelatihan');
        $this->load->model('InfoModel', 'info');
        $this->load->model('SispelModel', 'sispel');
        user_access();
    }

    function index()
    {
        $data = [
            'breadcrumbs'   => 'dashboard administrator',
            'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'kapel'         => $this->db->get('kategori_pelatihan')->num_rows(),
            'program'       => $this->db->get('program_pelatihan')->num_rows(),
            'info'          => $this->db->get('info')->num_rows()
        ];
        $data['judul'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function profil()
    {
        $data['judul'] = "Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    // User Akses
    function role()
    {
        $data['judul'] = "Role";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('role')->result_array();
        $this->form_validation->set_rules('addRole', 'Role', 'required', ['required' => 'Field Role Wajib Diisi !!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/user_templates/topbar', $data);
            $this->load->view('templates/user_templates/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $this->db->insert('role', ['name_role' => $this->input->post('addRole')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru telah ditambahkan!</div>');
            redirect(base_url('admin/role', 'refresh'));
        }
    }

    function akses_role($role_id)
    {
        $data['judul'] = "Role Akses";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('role', ['id_role' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/role_akses', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function ubah_akses()
    {
        $menu_id = $this->input->post('menuID');
        $role_id = $this->input->post('roleID');
        $data = [
            'id_role' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses berhasil diubah !!</div>');
    }

    function editRole()
    {
        $this->form_validation->set_rules('editRole', 'Role', 'required', ['required' => 'Field Role Wajib Diisi !!']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/user_templates/topbar', $data);
            $this->load->view('templates/user_templates/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $data   = array('name_role' => $this->input->post('editRole'));
            $where  = array('id_role' => $this->input->post('id_role'));
            $this->modelAdmin->editRole($where, $data, 'role');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil diubah !!</div>');
            redirect(base_url('admin/role'));
        }
    }

    function hapusRole($id)
    {
        $where = array('id_role' => $id);
        $this->modelAdmin->hapusRole($where, 'role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role berhasil dihapus !!</div>');
        redirect(base_url('admin/role'));
    }

    // load data peserta yang telah mendaftar
    function data_peserta()
    {
        $data['judul']      = "Data Peserta";
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data']  = $this->db->order_by('nama', 'ASC')->get_where('user', array('id_role' => 2))->result_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/data_peserta', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function detail_user($id)
    {
        $data['judul']      = "Detail Peserta";
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data']  = $this->sispel->detailUser($id);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/detail_peserta', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    // load data pelatihan peserta yang telah terdaftar
    function data_pelatihan()
    {
        $data['judul']      = "Data Pelatihan";
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelatihan']  = $this->pelatihan->getDataPelatihan();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/data_pelatihan', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    // load data perusahaan yang telah terdaftar
    function data_perusahaan()
    {
        $data['judul'] = "Data Perusahaan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_data'] = $this->db->get_where('user', array('id_role' => 2))->result_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/data_perusahaan', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    function laporan()
    {
        $data['judul'] = "Laporan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/user_templates/topbar', $data);
        $this->load->view('templates/user_templates/sidebar', $data);
        $this->load->view('admin/laporan_sistem', $data);
        $this->load->view('templates/user_templates/footer');
        $this->load->view('templates/auth_footer');
    }

    // laporan
    function cetak_pelatihan()
    {
        $data['pelatihan']  = $this->pelatihan->getProgram();
        $this->load->view('admin/laporan/cetak_program', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size  = "A4";
        $orientation = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data-pelatihan.pdf", array("Attachment" => 0));
    }

    function cetak_peserta()
    {
        $data['judul'] = "Data Peserta";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peserta'] = $this->db->get_where('user', array('id_role' => 2))->result_array();
        $this->load->view('admin/laporan/cetak_peserta', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size  = "A4";
        $orientation = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data-peserta.pdf", array("Attachment" => 0));
    }

    function cetak_jadwal()
    {
        $data['judul']  = "Data Jadwal Pelatihan";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->pelatihan->getJadwal();
        $this->load->view('admin/laporan/cetak_jadwal', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size  = "A4";
        $orientation = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data-jadwal.pdf", array("Attachment" => 0));
    }

    function cetak_info()
    {
        $data['judul']  = "Data Info Lowongan Kerja";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->info->getInfo();
        $this->load->view('admin/laporan/cetak_info', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size  = "A4";
        $orientation = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data-info.pdf", array("Attachment" => 0));
    }

    function print_pelatihan()
    {
        $data['judul']  = "Data Pendaftar Pelatihan Kerja";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelatihan']   = $this->pelatihan->getDataPelatihan();
        $this->load->view('admin/laporan/print_pelatihan', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size  = "A4";
        $orientation = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("print-pelatihan.pdf", array("Attachment" => 0));
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
            $this->load->view('templates/user_templates/topbar', $data);
            $this->load->view('templates/user_templates/sidebar', $data);
            $this->load->view('admin/ubah_password', $data);
            $this->load->view('templates/user_templates/footer');
            $this->load->view('templates/auth_footer');
        } else {
            $current_password   = $this->input->post('oldpassword');
            $new_password       = $this->input->post('newpassword');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama yang anda masukan salah !!
                </div>');
                redirect(base_url('admin/ubah_password'));
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password lama !!
                    </div>');
                    redirect(base_url('admin/ubah_password'));
                } else {
                    // Password OK
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah !!
                    </div>');
                    redirect(base_url('user/ubah_password'));
                }
            }
        }
    }

    function ubah_status($id)
    {
        $this->db->set('status_pelatihan', 1);
        $this->db->where('no_pelatihan', $id);
        $this->db->update('pelatihan');
        $this->session->set_flashdata('success', 'Status berhasil diubah!');
        redirect('admin/data_pelatihan', 'refresh');
    }
}
/* End of file Admin.php */