<?php

class Menu_model extends CI_Model
{

    public function tampilkanmenu()
    {
        $query = $this->db->query('SELECT * FROM menu');
        return $query->result();
    }

    public function tampilkanmenuarray()
    {
        $query = $this->db->query('SELECT * FROM menu');
        return $query->result_array();
    }
}
