<?php
class m_chatting extends CI_Model
{
    public function select_chat($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = chatting.id_pelanggan', 'left');
        $this->db->join('user', 'user.id_user = chatting.id_admin', 'left');
        $this->db->where('chatting.id_pelanggan', $id_pelanggan);
        $chat['list_chat'] = $this->db->get()->result();
        return $chat;
    }

    public function select_chatting()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan IS NOT NULL');
        $this->db->group_by('chatting.id_pelanggan');
        $data['chat'] = $this->db->get()->result();
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan IS NOT NULL');
        $this->db->group_by('chatting.id_pelanggan');
        $data['jml'] = $this->db->get()->num_rows();
        return $data;
    }

    //chatting di pelanggan
    public function chat()
    {
        $ses = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->where('id_pelanggan', $ses);
        return $this->db->get()->result();
    }
}
