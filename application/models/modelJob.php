<?php
class modelJob extends CI_Model
{
  function addDataPT()
  {
    $this->db->insert('perusahaan');
  }

  function updateDataPerusahaan($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}