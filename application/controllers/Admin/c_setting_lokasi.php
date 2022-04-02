<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_setting_lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');
        $this->load->model('m_chatting');
    }
    public function index()
    {
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('alamat_toko', 'Alamat_Toko', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('no_telp', 'No_Telp', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting Lokasi',
                'setting' => $this->m_setting->data_setting(),
                'tampil_chat' => $this->m_chatting->select_chatting()
            );
            $this->load->view('admin/header', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/setting_lokasi/vsetting', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telp' => $this->input->post('no_telp'),
            );
            $this->m_setting->edit($data);
            $this->session->set_flashdata('pesan', 'Data Setingan Lokasi Berhasil Diupdate !!!');
            redirect('Admin/c_setting_lokasi');
        }
    }
}
