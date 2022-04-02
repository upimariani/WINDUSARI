<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_dasboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dasboard');
        $this->load->model('m_chatting');
        $this->load->library('session');
    }
    public function index()
    {

        $data = array(
            'title' => 'Dashboard',
            'jumlah' => $this->m_dasboard->hitungJumlahAsset(),
            'tampil_chat' => $this->m_chatting->select_chatting(),
            'produk' => $this->m_dasboard->lap_produk(),
            'tot_order' => $this->m_dasboard->tot_order(),
            'tot_produk' => $this->m_dasboard->tot_produk()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vdasboard', $data);
        $this->load->view('admin/footer');
    }
    public function chat($id_pelanggan)
    {
        $session = $this->session->userdata('id_user');
        $data = array(
            'title' => 'Chatting',
            'chatting' => $this->m_chatting->select_chat($id_pelanggan, $session, 1),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vchatting', $data);
    }
    public function send_mgs_chat($pelanggan_send = NULL)
    {
        $isi_pesan = $this->input->post('msg');
        $data = array(
            'admin_send' => $isi_pesan,
            'id_admin' =>  $this->session->userdata('id_user'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'pelanggan_send' => $pelanggan_send
        );
        $this->db->insert('chatting', $data);
        $insert_id = $this->db->insert_id();

        $this->db->where(array('chatting.id_chatting' => $insert_id));
        $this->db->join('user', 'chatting.id_admin = user.id_user');
        $msg = $this->db->get('chatting')->row();

        header('Content-Type: application/json');
        echo json_encode($msg);
    }
}
