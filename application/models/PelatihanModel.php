<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PelatihanModel extends CI_Model
{
  private $table     = 'kategori_pelatihan';
  // program pelatihan
  function getProgram()
  {
    $this->db->select('*');
    $this->db->from('program_pelatihan');
    $this->db->join('kategori_peserta', 'kategori_peserta.id_kategori=program_pelatihan.kategori_id', 'LEFT');
    $this->db->join('kategori_pelatihan', 'kategori_pelatihan.id=program_pelatihan.kapel_id', 'LEFT');
    $result   = $this->db->get();
    return $result->result_array();
  }

  // jadwal pelatihan
  function getJadwal()
  {
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=jadwal_pelatihan.program_id', 'LEFT');
    $this->db->order_by('status', 'desc');
    $result = $this->db->get();
    return $result->result_array();
  }

  function getDataJadwal($limit, $start)
  {
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=jadwal_pelatihan.program_id', 'LEFT');
    $this->db->where('status', 1);
    $this->db->limit($limit, $start);
    $result = $this->db->get();
    return $result->result_array();
  }

  function getPelatihan($id_user)
  {
    $this->db->select('*');
    $this->db->from('pelatihan');
    $this->db->join('user', 'user.id_user=pelatihan.user_id', 'RIGHT');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=pelatihan.program_id', 'RIGHT');
    $this->db->join('jadwal_pelatihan', 'jadwal_pelatihan.id_jadwal=pelatihan.jadwal_id', 'RIGHT');
    $this->db->where('user_id', $id_user);
    $result = $this->db->get();
    return $result->row_array();
  }

  function getDataPelatihan()
  {
    $this->db->select('*');
    $this->db->from('pelatihan');
    $this->db->join('user', 'user.id_user=pelatihan.user_id');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=pelatihan.program_id');
    $this->db->join('jadwal_pelatihan', 'jadwal_pelatihan.id_jadwal=pelatihan.jadwal_id');
    $result = $this->db->get();
    return $result->result_array();
  }

  function getKategori()
  {
    $result = $this->db->get($this->table);
    return $result->result_array();
  }
  // end get data

  // func insert
  function insertProgram($data)
  {
    $this->db->insert('program_pelatihan', $data);
  }

  function insertJadwal($data)
  {
    $this->db->insert('jadwal_pelatihan', $data);
  }

  function insertPelatihan($data)
  {
    $this->db->insert('pelatihan', $data);
  }

  function insertKategori($data)
  {
    $this->db->insert($this->table, $data);
  }
  // end insert

  // func ambil id
  function getIdProgram($id)
  {
    $row  = $this->db->get_where('program_pelatihan', ['id_program' => $id]);
    return $row->row_array();
  }

  function getIdJadwal($id)
  {
    $row  = $this->db->get_where('jadwal_pelatihan', ['id_jadwal' => $id]);
    return $row->row_array();
  }

  function getDataIdJadwal($id)
  {
    $this->db->select('*');
    $this->db->from('jadwal_pelatihan');
    $this->db->join('program_pelatihan', 'program_pelatihan.id_program=jadwal_pelatihan.program_id');
    $this->db->where('id_jadwal', $id);
    $result = $this->db->get();
    return $result->result_array();
  }

  function getIdKategori($id)
  {
    $row = $this->db->get_where($this->table, ['id' => $id]);
    return $row->row_array();
  }
  // end

  function countJadwal()
  {
    return $this->db->get_where('jadwal_pelatihan', ['status' => 1])->num_rows();
  }

  // func update
  function updateProgram($row, $data)
  {
    $this->db->where($row);
    $this->db->update('program_pelatihan', $data);
  }

  function updateKategori($row, $data)
  {
    $this->db->where($row);
    $this->db->update($this->table, $data);
  }

  function updateJadwal($row, $data)
  {
    $this->db->where($row);
    $this->db->update('jadwal_pelatihan', $data);
  }
  // end update

  // func delete
  function deleteProgram($row)
  {
    $this->db->where($row);
    $this->db->delete('program_pelatihan');
  }

  function deleteKategori($row)
  {
    $this->db->where($row);
    $this->db->delete($this->table);
  }

  function deleteJadwal($row)
  {
    $this->db->where($row);
    $this->db->delete('jadwal_pelatihan');
  }
  // end delete

  // func kode otomatis
  function kdProgram()
  {
    date_default_timezone_set('Asia/Jakarta');
    $sql = "SELECT MAX(MID(kode_program,9,4)) AS kd_program 
            FROM program_pelatihan 
            WHERE MID(kode_program,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $no  = ((int) $row->kd_program) + 1;
      $kd  = sprintf("%'.04d", $no);
    } else {
      $kd  = "0001";
    }
    $kode_program = "PP" . date('ymd') . $kd;
    return $kode_program;
  }

  function noPelatihan()
  {
    date_default_timezone_set('Asia/Jakarta');
    $sql    = "SELECT MAX(MID(no_pelatihan,9,4)) AS pelatihan_no 
              FROM pelatihan 
              WHERE MID(no_pelatihan,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
    $query  = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row_array();
      $n   = ((int) $row['pelatihan_no']) + 1;
      $no  = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $no_pelatihan = "PL" . date('ymd') . $no;
    return $no_pelatihan;
  }
  // end kode
}
