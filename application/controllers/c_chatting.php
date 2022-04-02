<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_chatting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chatting');
        $this->load->library('session');
    }
    public function index()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'tittle' => 'Chatting',
            'chat' => $this->m_chatting->chat()
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vchatting', $data);
    }
    public function send_mgs_chat($admin_send = NULL)
    {
        $isi_pesan = $this->input->post('msg');
        $data = array(
            'pelanggan_send' => $isi_pesan,
            'id_admin' => '10',
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'admin_send' => $admin_send
        );
        $this->db->insert('chatting', $data);
        $insert_id = $this->db->insert_id();

        $this->db->where(array('chatting.id_chatting' => $insert_id));
        $msg = $this->db->get('chatting')->row();

        header('Content-Type: application/json');
        echo json_encode($msg);
    }
}
