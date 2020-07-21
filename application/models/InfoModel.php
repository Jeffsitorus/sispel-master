<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class InfoModel extends CI_Model
{

  private $_table   = 'info';
  private $table     = 'kategori_info';

  // manajemen info
  function getInfo()
  {
    $this->db->select('info.*, kategori_info.id as id_kategori, kategori_info.keterangan');
    $this->db->from($this->_table);
    $this->db->join('kategori_info', 'info.id_kategori=kategori_info.id');
    $result = $this->db->get();
    return $result->result_array();
  }

  function countInfo()
  {
    return $this->db->get_where($this->_table, ['status'  => 1])->num_rows();
  }

  function getDataInfo($limit, $start)
  {
    $this->db->select('info.*, kategori_info.id as id_kategori, kategori_info.keterangan');
    $this->db->from($this->_table);
    $this->db->join('kategori_info', 'info.id_kategori=kategori_info.id','LEFT');
    $this->db->where('status', 1);
    $this->db->order_by('tgl_mulai','asc');
    $this->db->limit($limit, $start);
    $result = $this->db->get();
    return $result->result_array();
  }

  function insertInfo($data)
  {
    $this->db->insert($this->_table, $data);
  }

  function getIdInfo($id)
  {
    $row   = $this->db->get_where($this->_table, ['id' => $id]);
    return $row->row_array();
  }

  function updateInfo($row, $data)
  {
    $this->db->where($row);
    $this->db->update($this->_table, $data);
  }

  function deleteInfo($row)
  {
    $this->db->where($row);
    $this->db->delete($this->_table);
  }

  // end

  // manajemen kategori info
  function getKategori()
  {
    $result = $this->db->get($this->table);
    return $result->result_array();
  }

  function insertKategori($data)
  {
    $this->db->insert($this->table, $data);
  }

  function getIdKategori($id)
  {
    $row = $this->db->get_where($this->table, ['id' => $id]);
    return $row->row_array();
  }

  function updateKategori($row, $data)
  {
    $this->db->where($row);
    $this->db->update($this->table, $data);
  }

  function deleteKategori($row)
  {
    $this->db->where($row);
    $this->db->delete($this->table);
  }
}
/* end of file InfoModel.php */