<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelAuth extends CI_Model
{
    function regMembers($data)
    {
        $this->db->insert('user',$data);
    }
}



/* End of file filename.php */
