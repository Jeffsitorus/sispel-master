<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Info extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('InfoModel', 'info');
    $this->load->library('upload');
    $this->load->library('pagination');
  }

  function index()
  {
    $data   = [
      'breadcrumbs'   => 'data info lowongan',
      'info'          => $this->info->getInfo(),
      'user'          => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'judul'         => 'Info Lowongan',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('info/data-info', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function info_add()
  {
    $this->_rulesinfo();
    if ($this->form_validation->run() == false) {
      $data = [
        'breadcrumbs'  => 'tambah info',
        'kategori'     => $this->info->getKategori(),
        'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'judul'        => 'Tambah Info',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('info/create-info', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      if ($_FILES['gambar']['name'] != null) {
        $this->_upload();
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'breadcrumbs'  => 'tambah info',
            'kategori'     => $this->info->getKategori(),
            'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul'        => 'Tambah Info',
          ];
          $error  =  $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $this->load->view('templates/auth_header', $data);
          $this->load->view('templates/user_templates/topbar', $data);
          $this->load->view('templates/user_templates/sidebar', $data);
          $this->load->view('info/create-info', $data);
          $this->load->view('templates/user_templates/footer');
          $this->load->view('templates/auth_footer');
        } else {
          $upload = ['upload_data' => $this->upload->data()];
          $this->_inputError();
          $data   = [
            'id_kategori'   => $this->input->post('kategori_id', true),
            'judul_info'    => htmlspecialchars($this->input->post('judul_info', true)),
            'tgl_mulai'     => $this->input->post('tgl_mulai', true),
            'tgl_selesai'   => $this->input->post('tgl_selesai', true),
            'gambar'        => $upload['upload_data']['file_name'],
            'status'        => 0,
          ];
          $this->info->insertInfo($data);
          $this->session->set_flashdata('success', 'Info berhasil ditambahkan.');
          redirect('info', 'refresh');
        }
      } else {
        $this->_inputError();
        $data   = [
          'id_kategori'   => $this->input->post('kategori_id', true),
          'judul_info'    => htmlspecialchars($this->input->post('judul_info', true)),
          'tgl_mulai'     => $this->input->post('tgl_mulai', true),
          'tgl_selesai'   => $this->input->post('tgl_selesai', true),
          'status'        => 0,
        ];
        $this->info->insertInfo($data);
        $this->session->set_flashdata('success', 'Info berhasil ditambahkan.');
        redirect('info', 'refresh');
      }
    }
  }

  function info_edit($id)
  {
    $this->_rulesinfo();
    if ($this->form_validation->run() == false) {
      $data = [
        'breadcrumbs'  => 'edit info',
        'kategori'     => $this->info->getKategori(),
        'info'         => $this->info->getIdInfo($id),
        'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'judul'        => 'Edit Info',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('info/edit-info', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      if ($_FILES['gambar']['name'] != null) {
        $this->_upload();
        if (!$this->upload->do_upload('gambar')) {
          $data   = [
            'breadcrumbs'  => 'edit info',
            'kategori'     => $this->info->getKategori(),
            'info'         => $this->info->getIdInfo($id),
            'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'judul'        => 'Edit Info',
          ];
          $error  = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $this->load->view('templates/auth_header', $data);
          $this->load->view('templates/user_templates/topbar', $data);
          $this->load->view('templates/user_templates/sidebar', $data);
          $this->load->view('info/edit-info', $data);
          $this->load->view('templates/user_templates/footer');
          $this->load->view('templates/auth_footer');
        } else {
          $info   = $this->info->getIdInfo($id);
          if ($info['gambar'] != null) {
            unlink(FCPATH . './assets/upload/' . $info['gambar']);
          }
          $upload = ['upload_data' => $this->upload->data()];
          $this->_inputError();
          $data   = [
            'id_kategori'   => $this->input->post('kategori_id', true),
            'judul_info'    => htmlspecialchars($this->input->post('judul_info', true)),
            'tgl_mulai'     => $this->input->post('tgl_mulai', true),
            'tgl_selesai'   => $this->input->post('tgl_selesai', true),
            'gambar'        => $upload['upload_data']['file_name'],
            'status'        => 0,
          ];
          $row  = ['id' => $id];
          $this->info->updateInfo($row, $data);
          $this->session->set_flashdata('success', 'Data info berhasil diubah.');
          redirect('info', 'refresh');
        }
      } else {
        $this->_inputError();
        $data   = [
          'id_kategori'   => $this->input->post('kategori_id', true),
          'judul_info'    => htmlspecialchars($this->input->post('judul_info', true)),
          'tgl_mulai'     => $this->input->post('tgl_mulai', true),
          'tgl_selesai'   => $this->input->post('tgl_selesai', true),
          'status'        => 0,
        ];
        $row  = ['id' => $id];
        $this->info->updateInfo($row, $data);
        $this->session->set_flashdata('success', 'Data info berhasil diubah.');
        redirect('info', 'refresh');
      }
    }
  }

  function tampil_info()
  {
    $config['base_url']   = 'http://localhost/sispel/info/tampil_info';
    $config['total_rows'] = $this->info->countInfo();
    $config['per_page']   = 6;
    $this->pagination->initialize($config);
    $data['start']        = $this->uri->segment(3);
    $data   = [
      'breadcrumbs'  => 'daftar info lowongan',
      'info'         => $this->info->getDataInfo($config['per_page'], $data['start']),
      'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'judul'        => 'Daftar Info Lowongan',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('info/tampil-info', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  // detail info lowongan
  function detail($id)
  {
    $data   = [
      'breadcrumbs'  => 'detail info lowongan',
      'info'         => $this->info->getIdInfo($id),
      'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'judul'        => 'Detail Info Lowongan',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('info/detail-info', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function editStatus($id)
  {
    $row  = ['id'   => $id];
    $this->db->set('status', 1);
    $this->db->where($row);
    $this->db->update('info');
    $this->session->set_flashdata('success','Status info berhasil diubah!');
    redirect('info','refresh');
  }

  function nonaktifkan($id)
  {
    $row  = ['id'   => $id];
    $this->db->set('status', 0);
    $this->db->where($row);
    $this->db->update('info');
    $this->session->set_flashdata('success','Status info berhasil dinonaktifkan!');
    redirect('info','refresh');
  }

  function info_delete($id = null)
  {
    $info   = $this->info->getIdInfo($id);
    if ($info['id'] == null) {
      $this->_errorInfo();
    }

    if ($info['gambar'] != null) {
      unlink(FCPATH . './assets/upload/' . $info['gambar']);
    }

    $row  = ['id' => $id];
    $this->info->deleteInfo($row);
    $this->session->set_flashdata('success', 'Info berhasil dihapus.');
    redirect('info', 'refresh');
  }

  function kategori()
  {
    $data   = [
      'title'      => 'kategori info',
      'kategori'   => $this->info->getKategori(),
      'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'judul'      => 'Kategori Info',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('info/data-kategori', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function kategori_add()
  {
    $this->_rulesKategori();
    if ($this->form_validation->run() == false) {
      redirect('info/kategori', 'refresh');
    } else {
      $data   = [
        'keterangan'   =>  htmlspecialchars($this->input->post('keterangan', true)),
        'created_at'   => date('Y-m-d H:i:s'),
      ];
      $this->info->insertKategori($data);
      $this->session->set_flashdata('success', 'Kategori info berhasil ditambah.');
      redirect('info/kategori', 'refresh');
    }
  }

  function kategori_edit($id = null)
  {
    $this->_rulesKategori();
    $data['kategori']   = $this->info->getIdKategori($id);
    if ($data['kategori']['id'] == null) {
      $this->_errorKategori();
    }

    if ($this->form_validation->run() == false) {
      $data = [
        'breadcrumbs'  => 'update kategori',
        'kategori'     => $this->info->getIdKategori($id),
        'user'         => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'judul'        => 'Update Kategori',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('info/edit-kategori', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      $data   = [
        'keterangan'   => htmlspecialchars($this->input->post('keterangan', true)),
        'created_at'   => date('Y-m-d H:i:s'),
        'updated_at'   => date('Y-m-d H:i:s'),
      ];
      $row  = ['id' => $id];
      $this->info->updateKategori($row, $data);
      $this->session->set_flashdata('success', 'Kategori info berhasil diubah.');
      redirect('info/kategori', 'refresh');
    }
  }

  function kategori_delete($id = null)
  {
    $data['kategori']   = $this->info->getIdKategori($id);
    if ($data['kategori']['id'] == null) {
      $this->_errorKategori();
    }

    $row  = ['id' => $id];
    $this->info->deleteKategori($row);
    $this->session->set_flashdata('success', 'Kategori info berhasil dihapus.');
    redirect('info/kategori', 'refresh');
  }

  // private function info
  private function _rulesinfo()
  {
    $this->form_validation->set_rules('kategori_id', 'kategori', 'trim|required', [
      'required'    => 'Kategori info tidak boleh dikosongkan!',
    ]);
    $this->form_validation->set_rules('judul_info', 'Judul Info', 'trim|required|max_length[50]', [
      'required'    => 'Judul info harus diisi!',
      'max_length'  => 'Judul maksimal 50 karakter!',
    ]);
    $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required', [
      'required'    => 'Tanggal mulai harus diisi!',
    ]);
    $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required', [
      'required'    => 'Tanggal masa aktif harus diisi!',
    ]);
  }

  private function _upload()
  {
    $config['upload_path']    = './assets/upload/info/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']       = '2048';
    $config['file_name']      = 'info_' . date('dmY');
    $this->upload->initialize($config);
  }

  private function _errorInfo()
  {
    $this->session->set_flashdata('error', 'Data info tidak ditemukan.');
    redirect('info', 'refresh');
  }

  private function _inputError()
  {
    $tgl_mulai    = $this->input->post('tgl_mulai', true);
    $tgl_selesai  = $this->input->post('tgl_selesai', true);
    $dateNow      = date('Y-m-d');
    if ($tgl_mulai < $dateNow) {
      $this->session->set_flashdata('input_error', 'Tanggal yang diinputkan tidak benar!');
      redirect('info/info_add', 'refresh');
    } else if ($tgl_selesai <= $tgl_mulai) {
      $this->session->set_flashdata('input_errors', 'Tanggal yang diinputkan tidak benar!');
      redirect('info/info_add', 'refresh');
    }
  }

  // private function kategori info
  private function _rulesKategori()
  {
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
      'required'  => 'Keterangan tidak boleh dikosongkan!',
    ]);
  }

  private function _errorKategori()
  {
    $this->session->set_flashdata('error', 'Kategori info tidak ditemukan.');
    redirect('info/kategori', 'refresh');
  }
}

/* end of file info.php */