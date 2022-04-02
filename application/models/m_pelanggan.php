<?php
class m_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('pelanggan', $data);
    }
}
