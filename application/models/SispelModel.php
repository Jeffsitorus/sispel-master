<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SispelModel extends CI_Model
{

  // func get data
  function getKategoriPeserta()
  {
    $result =  $this->db->get('kategori_peserta');
    return $result->result_array();
  }

  function getProgram()
  {
    $this->db->select('*');
    $this->db->from('program_pelatihan');
    $this->db->join('kategori_pelatihan', 'kategori_pelatihan.id=program_pelatihan.kapel_id');
    $this->db->limit(3);
    $result = $this->db->get();
    return $result->result_array();
  }


  function getPeserta()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id_role', 2);
    $result   = $this->db->get();
    return $result->result_array();
  }

  function getPerusahaan()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id_role', 3);
    $result   = $this->db->get();
    return $result->result_array();
  }
  // end get

  // func insert
  function insertKategoriPeserta($data)
  {
    $this->db->insert('kategori_peserta', $data);
  }
  // end insert

  // func data
  function dataAllPelatihan($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('judul_program', $keyword);
    }
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program = jadwal_pelatihan.program_id');
    $this->db->limit($limit, $start);
    return $this->db->get()->result_array();
  }

  function dataProgram()
  {
    return $this->db->get('jadwal_pelatihan')->num_rows();
  }
  // end data

  // func update //
  function updateKategoriPeserta($row, $data)
  {
    $this->db->where($row);
    $this->db->update('kategori_peserta', $data);
  }

  // func delete //
  function deleteKategoriPeserta($row)
  {
    $this->db->where($row);
    $this->db->delete('kategori_peserta');
  }

  // func detail
  function detailUser($id)
  {
    $row = $this->db->get_where('user', ['id_user' => $id]);
    return $row->row_array();
  }
}
