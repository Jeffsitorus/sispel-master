<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class modelAdmin extends CI_Model
{
    function editRole($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function hapusRole($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}



/* End of file filename.php */
