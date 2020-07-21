<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Kategori extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('SispelModel', 'sispel');
  }

  function peserta()
  {
    $data  = [
      'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'breadcrumbs' => 'kategori peserta pelatihan',
      'kategori'    => $this->sispel->getKategoriPeserta(),
      'judul'       => 'Kategori Peserta',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('admin/kategori/kategori-peserta', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function tambahKategoriPeserta()
  {
    $this->_rules();
    if ($this->form_validation->run() == false) {
      $data  = [
        'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'breadcrumbs' => 'Tambah kategori peserta',
        'kategori'    => $this->sispel->getKategoriPeserta(),
        'judul'       => 'Tambah Kategori Peserta',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('admin/kategori/kategori-peserta', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      $data   = [
        'nama_kategori'        => htmlspecialchars($this->input->post('nama_kategori', true)),
        'created_at'           => date('Y-m-d H:i:s'),
      ];
      $this->sispel->insertKategoriPeserta($data);
      $this->session->set_flashdata('success', 'Kategori peserta berhasil ditambah !');
      redirect('kategori/peserta', 'refresh');
    }
  }

  function editKategoriPeserta()
  {
    $this->_rules();
    if ($this->form_validation->run() == false) {
      $data  = [
        'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'breadcrumbs' => 'edit kategori peserta',
        'kategori'    => $this->sispel->getKategoriPeserta(),
        'judul'       => 'Edit Kategori Peserta',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('admin/kategori/kategori-peserta', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      $data   = [
        'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
        'updated_at'    => date('Y-m-d H:i:s'),
      ];
      $id   = $this->input->post('id');
      $row  = ['id_kategori' => $id];
      $this->sispel->updateKategoriPeserta($row, $data);
      $this->session->set_flashdata('success', 'Kategori peserta berhasil diubah !');
      redirect('kategori/peserta', 'refresh');
    }
  }

  function hapusKategoriPeserta($id)
  {
    $row  = ['id_kategori' => $id];
    $this->sispel->deleteKategoriPeserta($row);
    $this->session->set_flashdata('success', 'Kategori peserta berhasil dihapus !');
    redirect('kategori/peserta', 'refresh');
  }

  private function _rules()
  {
    $this->form_validation->set_rules('nama_kategori', 'nama', 'trim|required', [
      'required'    => 'Nama kategori tidak boleh dikosongkan!',
    ]);
  }
}