<?php

class materi_model extends CI_Model
{
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
}