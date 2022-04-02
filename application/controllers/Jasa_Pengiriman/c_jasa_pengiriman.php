<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_jasa_pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jasa_pengiriman');
    }
    public function index()
    {
        $data = array(
            'tampil' => $this->m_jasa_pengiriman->tampil_data(),
            'jumlah' => $this->m_jasa_pengiriman->jumlah_pengguna()
        );
        $this->load->view('jasa_pengiriman/header');
        $this->load->view('jasa_pengiriman/aside');
        $this->load->view('jasa_pengiriman/vtracking', $data);
        $this->load->view('jasa_pengiriman/footer');
    }
    public function view($id_jasa_pengiriman)
    {
        $data['view'] = $this->m_jasa_pengiriman->view_tracking($id_jasa_pengiriman);
        $this->load->view('jasa_pengiriman/header');
        $this->load->view('jasa_pengiriman/aside');
        $this->load->view('jasa_pengiriman/vview_tracking', $data);
        $this->load->view('jasa_pengiriman/footer');
    }
    public function update_status_pengiriman()
    {
        $data = array(
            'id_jasa_pengiriman' => $this->input->post('id'),
            'status_pengiriman' => $this->input->post('status_pengiriman'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->m_jasa_pengiriman->insert_status_pengiriman($data);
        $this->session->set_flashdata('pesan', 'Data Pengiriman Berhasil Diperbaharui!!!');
        redirect('jasa_pengiriman/c_jasa_pengiriman');
    }

    public function view_json($id_jasa_pengiriman)
    {
        $data_view['view_tracking'] = $this->m_jasa_pengiriman->view_tracking($id_jasa_pengiriman);
        header('Content-Type: application/json');
        echo json_encode($data_view);
    }
    public function logout()
    {
        $this->user_login->logout();
    }
}
