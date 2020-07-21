<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Pelatihan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('PelatihanModel', 'pelatihan');
    $this->load->model('SispelModel', 'sispel');
    $this->load->library('upload');
    $this->load->library('pagination');
  }

  function  jadwal()
  {
    $data   = [
      'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'jadwal'      => $this->pelatihan->getJadwal(),
      'breadcrumbs' => 'data jadwal pelatihan',
      'judul'       => 'Jadwal Pelatihan',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('admin/program/jadwal', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function  tampil_jadwal()
  {
    $config['base_url']   = 'http://localhost/go-sispel/pelatihan/tampil_jadwal';
    $config['total_rows'] = $this->pelatihan->countJadwal();
    $config['per_page']   = 6;
    $this->pagination->initialize($config);
    $data['start']     = $this->uri->segment(3);
    $data   = [
      'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'jadwal'      => $this->pelatihan->getDataJadwal($config['per_page'], $data['start']),
      'breadcrumbs' => 'data jadwal pelatihan',
      'judul'       => 'Tampil Jadwal Pelatihan'
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('admin/program/tampil-jadwal', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function jadwal_tambah()
  {
    $this->_rulesJadwal();
    if ($this->form_validation->run() == false) {
      $data   = [
        'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'program'     => $this->pelatihan->getProgram(),
        'breadcrumbs' => 'data jadwal pelatihan',
        'judul'       => 'Tambah Jadwal Pelatihan',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('admin/program/jadwal-tambah', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      $data   = [
        'program_id'          => $this->input->post('program_id', true),
        'tgl_pendaftaran'     => $this->input->post('tgl_pendaftaran', true),
        'tutup_pendaftaran'   => $this->input->post('tutup_pendaftaran', true),
        'tgl_pelaksanaan'     => $this->input->post('tgl_pelaksanaan', true),
        'selesai_pelaksanaan' => $this->input->post('selesai_pelaksanaan', true),
        'lokasi'              => $this->input->post('lokasi', true),
        'hari'                => $this->input->post('hari', true),
      ];
      $this->pelatihan->insertJadwal($data);
      $this->session->set_flashdata('success', 'Jadwal pelatihan berhasil ditambah!');
      redirect('pelatihan/jadwal', 'refresh');
    }
  }

  function jadwal_ubah($id)
  {
    $row  = ['id_jadwal' => $id];
    $this->db->set('status', 1);
    $this->db->where($row);
    $this->db->update('jadwal_pelatihan');
    $this->session->set_flashdata('success', 'Jadwal pelatihan berhasil diaktifkan!');
    redirect('pelatihan/jadwal', 'refresh');
  }

  function jadwal_nonaktif($id)
  {
    $row  = ['id_jadwal' => $id];
    $this->db->set('status', 0);
    $this->db->where($row);
    $this->db->update('jadwal_pelatihan');
    $this->session->set_flashdata('success', 'Jadwal pelatihan berhasil dinonaktifkan!');
    redirect('pelatihan/jadwal', 'refresh');
  }

  function jadwal_edit($id)
  {
    $this->_rulesJadwal();
    if ($this->form_validation->run() == false) {
      $data   = [
        'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'program'     => $this->pelatihan->getProgram(),
        'breadcrumbs' => 'edit jadwal pelatihan',
        'jadwal'      => $this->pelatihan->getIdJadwal($id),
        'judul'       => 'Edit Jadwal Pelatihan',
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('admin/program/jadwal-edit', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      $data   = [
        'program_id'          => $this->input->post('program_id', true),
        'tgl_pendaftaran'     => $this->input->post('tgl_pendaftaran', true),
        'tutup_pendaftaran'   => $this->input->post('tutup_pendaftaran', true),
        'tgl_pelaksanaan'     => $this->input->post('tgl_pelaksanaan', true),
        'selesai_pelaksanaan' => $this->input->post('selesai_pelaksanaan', true),
        'lokasi'              => $this->input->post('lokasi', true),
        'hari'                => $this->input->post('hari', true),
      ];
      $row  = ['id_jadwal'  => $id];
      $this->pelatihan->updateJadwal($row, $data);
      $this->session->set_flashdata('success', 'Jadwal pelatihan berhasil diubah!');
      redirect('pelatihan/jadwal', 'refresh');
    }
  }

  function jadwal_hapus($id)
  {
    $jadwal   = $this->pelatihan->getIdJadwal($id);
    if ($jadwal['id_jadwal'] == null) {
      $this->session->set_flashdata('error', 'Jadwal pelatihan tidak ditemukan !');
      redirect('pelatihan/jadwal', 'refresh');
    }
    $row  = ['id_jadwal'  => $id];
    $this->pelatihan->deleteJadwal($row);
    $this->session->set_flashdata('success', 'Jadwal pelatihan berhasil dihapus!');
    redirect('pelatihan/jadwal', 'refresh');
  }

  function program()
  {
    $data   = [
      'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'program'     => $this->pelatihan->getProgram(),
      'breadcrumbs' => 'data program pelatihan',
      'judul'       => 'Program Pelatihan',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('admin/program/index', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function program_tambah()
  {
    $this->_rulesProgram();
    if ($this->form_validation->run() == false) {
      $data   = [
        'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'kategori'    => $this->sispel->getKategoriPeserta(),
        'kapel'       => $this->pelatihan->getKategori(),
        'breadcrumbs' => 'tambah program pelatihan',
        'judul'       => 'Tambah Program Pelatihan',
        'kode_program' => $this->pelatihan->kdProgram(),
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('admin/program/tambah-program', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      if ($_FILES['gambar']['name']) {
        $this->_configFile();
        if (!$this->upload->do_upload('gambar')) {
          $error  = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data   = [
            'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'kategori'    => $this->sispel->getKategoriPeserta(),
            'breadcrumbs' => 'tambah program pelatihan',
            'kapel'       => $this->pelatihan->getKategori(),
            'judul'       => 'Tambah Program Pelatihan',
            'kode_program' => $this->pelatihan->kdProgram(),
          ];
          $this->load->view('templates/auth_header', $data);
          $this->load->view('templates/user_templates/topbar', $data);
          $this->load->view('templates/user_templates/sidebar', $data);
          $this->load->view('admin/program/tambah-program', $data);
          $this->load->view('templates/user_templates/footer');
          $this->load->view('templates/auth_footer');
        } else {
          $this->_inputError();
          $upload = ['upload_data'  => $this->upload->data()];
          $data   = [
            'judul_program'     => $this->input->post('judul_program', true),
            'kategori_id'       => $this->input->post('kategori_id', true),
            'kode_program'      => htmlspecialchars($this->input->post('kode_program', true)),
            'lama_pelaksanaan'  => $this->input->post('lama_pelaksanaan', true),
            'batas_kuota'       => $this->input->post('batas_kuota', true),
            'deskripsi'         => $this->input->post('deskripsi', true),
            'gambar'            => $upload['upload_data']['file_name'],
            'kapel_id'          => $this->input->post('kapel_id'),
          ];
          $this->pelatihan->insertProgram($data);
          $this->session->set_flashdata('success', 'Program pelatihan berhasil ditambah!');
          redirect('pelatihan/program', 'refresh');
        }
      } else {
        $this->_inputError();
        $data   = [
          'judul_program'     => $this->input->post('judul_program', true),
          'kategori_id'       => $this->input->post('kategori_id', true),
          'kode_program'      => htmlspecialchars($this->input->post('kode_program', true)),
          'lama_pelaksanaan'  => $this->input->post('lama_pelaksanaan', true),
          'batas_kuota'       => $this->input->post('batas_kuota', true),
          'deskripsi'         => $this->input->post('deskripsi', true),
          'kapel_id'          => $this->input->post('kapel_id'),
        ];
        $this->pelatihan->insertProgram($data);
        $this->session->set_flashdata('success', 'Program pelatihan berhasil ditambah!');
        redirect('pelatihan/program', 'refresh');
      }
    }
  }

  function program_detail($id)
  {
    $data['judul']    = "Detail program pelatihan";
    $data['breadcrumbs']  = "detail program pelatihan";
    $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['program']  = $this->pelatihan->getIdProgram($id);
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('admin/program/detail-program', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function program_edit($id)
  {
    $this->_rulesProgram();
    if ($this->form_validation->run() == false) {
      $data   = [
        'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        'kategori'    => $this->sispel->getKategoriPeserta(),
        'program'     => $this->pelatihan->getIdProgram($id),
        'breadcrumbs' => 'update program pelatihan',
        'kapel'       => $this->pelatihan->getKategori(),
        'judul'       => 'Update Program Pelatihan',
        'kode_program' => $this->pelatihan->kdProgram(),
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('templates/user_templates/topbar', $data);
      $this->load->view('templates/user_templates/sidebar', $data);
      $this->load->view('admin/program/edit-program', $data);
      $this->load->view('templates/user_templates/footer');
      $this->load->view('templates/auth_footer');
    } else {
      if ($_FILES['gambar']['name']) {
        $this->_configFile();
        if (!$this->upload->do_upload('gambar')) {
          $error  = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data   = [
            'user'        => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'kategori'    => $this->sispel->getKategoriPeserta(),
            'breadcrumbs' => 'update program pelatihan',
            'kapel'       => $this->pelatihan->getKategori(),
            'program'     => $this->pelatihan->getIdProgram($id),
            'judul'       => 'Edit Program Pelatihan',
            'kode_program' => $this->pelatihan->kdProgram(),
          ];
          $this->load->view('templates/auth_header', $data);
          $this->load->view('templates/user_templates/topbar', $data);
          $this->load->view('templates/user_templates/sidebar', $data);
          $this->load->view('admin/program/edit-program', $data);
          $this->load->view('templates/user_templates/footer');
          $this->load->view('templates/auth_footer');
        } else {
          $upload = ['upload_data'  => $this->upload->data()];
          $program  = $this->pelatihan->getIdProgram($id);
          if ($program['gambar'] != null) {
            unlink(FCPATH . './assets/upload/program/' . $program['gambar']);
          }
          $lama_pelaksanaan   = $this->input->post('lama_pelaksanaan', true);
          $batas_kuota        = $this->input->post('batas_kuota', true);
          $number = 0;
          if ($lama_pelaksanaan <= $number) {
            $this->session->set_flashdata('input_error', 'Lama pelaksanaan tidak boleh kurang dari atau sama dengan nol!');
            redirect('pelatihan/program_edit/' . $id, 'refresh');
          }
          if ($batas_kuota <= $number) {
            $this->session->set_flashdata('input_errors', 'Batas kuota tidak boleh kurang dari atau sama dengan nol!');
            redirect('pelatihan/program_edit/' . $id, 'refresh');
          }
          $data   = [
            'judul_program'     => $this->input->post('judul_program', true),
            'kategori_id'       => $this->input->post('kategori_id', true),
            'kode_program'      => htmlspecialchars($this->input->post('kode_program', true)),
            'lama_pelaksanaan'  => htmlspecialchars($this->input->post('lama_pelaksanaan', true)),
            'batas_kuota'       => htmlspecialchars($this->input->post('batas_kuota', true)),
            'deskripsi'         => $this->input->post('deskripsi', true),
            'gambar'            => $upload['upload_data']['file_name'],
            'kapel_id'          => $this->input->post('kapel_id'),
          ];
          $row  = ['id_program' => $id];
          $this->pelatihan->updateProgram($row, $data);
          $this->session->set_flashdata('success', 'Program pelatihan berhasil diubah!');
          redirect('pelatihan/program', 'refresh');
        }
      } else {
        $lama_pelaksanaan   = $this->input->post('lama_pelaksanaan', true);
        $batas_kuota        = $this->input->post('batas_kuota', true);
        $number = 0;
        if ($lama_pelaksanaan <= $number) {
          $this->session->set_flashdata('input_error', 'Lama pelaksanaan tidak boleh kurang dari atau sama dengan nol!');
          redirect('pelatihan/program_edit/' . $id, 'refresh');
        }
        if ($batas_kuota <= $number) {
          $this->session->set_flashdata('input_errors', 'Batas kuota tidak boleh kurang dari atau sama dengan nol!');
          redirect('pelatihan/program_edit/' . $id, 'refresh');
        }
        $data   = [
          'judul_program'     => $this->input->post('judul_program', true),
          'kategori_id'       => $this->input->post('kategori_id', true),
          'kode_program'      => htmlspecialchars($this->input->post('kode_program', true)),
          'lama_pelaksanaan'  => $this->input->post('lama_pelaksanaan', true),
          'batas_kuota'       => $this->input->post('batas_kuota', true),
          'deskripsi'         => $this->input->post('deskripsi', true),
          'kapel_id'          => $this->input->post('kapel_id'),
        ];
        $row  = ['id_program' => $id];
        $this->pelatihan->updateProgram($row, $data);
        $this->session->set_flashdata('success', 'Program pelatihan berhasil diubah!');
        redirect('pelatihan/program', 'refresh');
      }
    }
  }


  function program_hapus($id)
  {
    $program  = $this->pelatihan->getIdProgram($id);
    if ($program['gambar'] != null) {
      unlink(FCPATH . './assets/upload/program/' . $program['gambar']);
    }
    $row  = ['id_program' => $id];
    $this->pelatihan->deleteProgram($row);
    $this->session->set_flashdata('success', 'Program pelatihan berhasil dihapus!');
    redirect('pelatihan/program', 'refresh');
  }

  // private rulesJadwal
  private function _rulesJadwal()
  {
    $this->form_validation->set_rules('program_id', 'Program pelatihan', 'trim|required', [
      'required'    => 'Program pelatihan harus dipilih!',
    ]);
    $this->form_validation->set_rules('tgl_pendaftaran', 'Tanggal pendaftaran', 'trim|required', [
      'required'    => 'Tanggal mulai pendaftaran harus diisi!',
    ]);
    $this->form_validation->set_rules('tutup_pendaftaran', 'Tutup pendaftaran', 'trim|required', [
      'required'    => 'Tanggal penutupan pendaftaran harus diisi!'
    ]);
    $this->form_validation->set_rules('tgl_pelaksanaan', 'Tanggal pelaksanaan', 'trim|required', [
      'required'    => 'Tanggal pelaksanaan pelatihan harus diisi!',
    ]);
    $this->form_validation->set_rules('selesai_pelaksanaan', 'Selesai pelaksanaan', 'trim|required', [
      'required'    => 'Tanggal selesai pelaksanaan pelatihan harus diketahui',
    ]);
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required', [
      'required'    => 'Lokasi harus diinputkan!',
    ]);
    $this->form_validation->set_rules('hari', 'Hari', 'trim|required', [
      'required'    => 'Hari kegiatan pelatihan tidak boleh kosong!',
    ]);
  }

  // private config file
  private function _configFile()
  {
    $config['upload_path']    = './assets/upload/program/';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']       = '1024';
    $config['file_name']      = 'P_' . date('Ymd');
    $this->upload->initialize($config);
  }

  private function _rulesProgram()
  {
    $this->form_validation->set_rules('judul_program', 'Judul program', 'trim|required', [
      'required'    => 'Judul program tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('kategori_id', 'Kategori peserta', 'trim|required', [
      'required'    => 'Kategori peserta harus dipilih!',
    ]);
    $this->form_validation->set_rules('kapel_id', 'Kategori pelatihan', 'trim|required', [
      'required'    => 'Kategori pelatihan harus dipilih!',
    ]);
    $this->form_validation->set_rules('kode_program', 'Kode program', 'trim|required', [
      'required'    => 'Kode program tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('lama_pelaksanaan', 'Lama pelaksanaan', 'trim|required|numeric', [
      'required'    => 'lama pelaksanaan harus diisi!',
      'numeric'     => 'Hanya angka yang diinputkan!'
    ]);
    $this->form_validation->set_rules('batas_kuota', 'Batas kuota', 'trim|required|numeric', [
      'required'    => 'Batas kuota harus diisi!',
      'numeric'     => 'Inputkan hanya angka!'
    ]);
  }

  private function _inputError()
  {
    $lama_pelaksanaan   = $this->input->post('lama_pelaksanaan', true);
    $batas_kuota        = $this->input->post('batas_kuota', true);
    $number = 0;
    if ($lama_pelaksanaan <= $number) {
      $this->session->set_flashdata('input_error', 'Lama pelaksanaan tidak boleh kurang dari atau sama dengan nol!');
      redirect('pelatihan/program_tambah', 'refresh');
    }
    if ($batas_kuota <= $number) {
      $this->session->set_flashdata('input_errors', 'Batas kuota tidak boleh kurang dari atau sama dengan nol!');
      redirect('pelatihan/program_tambah', 'refresh');
    }
  }

  function kategori()
  {
    $data   = [
      'title'      => 'kategori pelatihan',
      'kategori'   => $this->pelatihan->getKategori(),
      'user'       => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
      'judul'      => 'Kategori Pelatihan',
    ];
    $this->load->view('templates/auth_header', $data);
    $this->load->view('templates/user_templates/topbar', $data);
    $this->load->view('templates/user_templates/sidebar', $data);
    $this->load->view('pelatihan/data-kategori', $data);
    $this->load->view('templates/user_templates/footer');
    $this->load->view('templates/auth_footer');
  }

  function kategori_add()
  {
    $this->_rulesKategori();
    if ($this->form_validation->run() == false) {
      redirect('pelatihan/kategori', 'refresh');
    } else {
      $data   = [
        'keterangan'   =>  htmlspecialchars($this->input->post('keterangan', true)),
        'created_at'   => date('Y-m-d H:i:s'),
      ];
      $this->pelatihan->insertKategori($data);
      $this->session->set_flashdata('success', 'Kategori pelatihan berhasil ditambah.');
      redirect('pelatihan/kategori', 'refresh');
    }
  }

  function kategori_edit()
  {
    $this->_rulesKategori();
    if ($this->form_validation->run() == false) {
      redirect('pelatihan/kategori', 'refresh');
    } else {
      $data   = [
        'keterangan'   => htmlspecialchars($this->input->post('keterangan', true)),
        'updated_at'   => date('Y-m-d H:i:s'),
      ];
      $id   = $this->input->post('id');
      $row  = ['id' => $id];
      $this->pelatihan->updateKategori($row, $data);
      $this->session->set_flashdata('success', 'Kategori pelatihan berhasil diubah.');
      redirect('pelatihan/kategori', 'refresh');
    }
  }

  function kategori_delete($id)
  {
    $data['kategori']   = $this->pelatihan->getIdKategori($id);
    if ($data['kategori']['id'] == null) {
      $this->_errorKategori();
    }

    $row  = ['id' => $id];
    $this->pelatihan->deleteKategori($row);
    $this->session->set_flashdata('success', 'Kategori pelatihan berhasil dihapus.');
    redirect('pelatihan/kategori', 'refresh');
  }

  private function _rulesKategori()
  {
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
      'required'  => 'Keterangan tidak boleh dikosongkan!',
    ]);
  }

  private function _errorKategori()
  {
    $this->session->set_flashdata('error', 'Kategori pelatihan tidak ditemukan.');
    redirect('pelatihan/kategori', 'refresh');
  }
}

/* end of file pelatihan.php */