<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class modelMenu extends CI_Model 
{
    function getSubmenu()
    {
        $query = "  SELECT `user_submenu`.*, `user_menu`.`menu`
                    FROM `user_submenu` JOIN `user_menu`
                    ON `user_submenu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }   

    function ubahMenu($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function hapusMenu($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function ubahSubmenu($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function hapusSubmenu($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}



/* End of file filename.php */

