<?php

defined('BASEPATH') or exit('No direct script access allowed');
class modelUser extends CI_Model
{
    function updateDataPeserta($where, $data)
    {
        $this->db->where($where);
        $this->db->update('user', $data);
    }
}

/* End of file modelUser.php */
