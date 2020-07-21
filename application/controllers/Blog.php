<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{


  function __construct()
  {
    parent::__construct();
    $this->load->model('SispelModel','sispel');
    $this->load->model('PelatihanModel','pelatihan');
    $this->load->library('pagination');
  }

  function index()
  {
    $data['judul'] = 'List Pelatihan';
    // pagination
    $data['totalPelatihan'] = $this->sispel->dataProgram();
    if ($this->input->get('submit')) {
      $data['keyword'] = $this->input->get('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    // config
    $this->db->like('judul_program', $data['keyword']);
    $this->db->from('program_pelatihan');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 4;
    $this->pagination->initialize($config);
    $data['start']     = $this->uri->segment(3);
    $data['program']   = $this->sispel->dataAllPelatihan($config['per_page'], $data['start'], $data['keyword']);
    $data['kategori'] = $this->db->get('kategori_pelatihan')->result_array();
    $this->load->view('blog_templates/blog_header', $data);
    $this->load->view('templates/home_templates/header');
    $this->load->view('templates/home_templates/navbar');
    $this->load->view('blog_templates/blog_list', $data);
    $this->load->view('blog_templates/blog_footer');
  }

  function Homepage()
  {
    $data['judul']      = 'Homepage';
    $data['pelatihan']  = $this->db->get('kategori_pelatihan')->result_array();
    $data['program']    = $this->sispel->getProgram();
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/home_templates/header', $data);
    $this->load->view('templates/home_templates/navbar', $data);
    $this->load->view('homepage');
    $this->load->view('templates/home_templates/footer');
  }

  function blog_detail($id)
  {
    $data['judul'] = 'Detail Pelatihan';
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program = jadwal_pelatihan.program_id');
    $this->db->where('id_jadwal', $id);
    $data['program'] = $this->db->get()->row_array();
    $this->load->view('blog_templates/blog_header', $data);
    $this->load->view('templates/home_templates/header', $data);
    $this->load->view('templates/home_templates/navbar', $data);
    $this->load->view('blog_templates/blog_content', $data);
    $this->load->view('blog_templates/blog_footer');
  }

  function daftar()
  {
    if (!$this->session->userdata('email')) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger text-light" role="alert">
            Silahkan untuk membuat akun terlebih dahulu, sebelum daftar ke pelatihan.
          </div>');
      redirect('authuser');
    }
  }
}
