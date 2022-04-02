<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_diskon');
        $this->load->model('m_chatting');
    }
    public function index()
    {
        $data = array(
            'title' => 'Diskon Produk',
            'tampil_diskon' => $this->m_diskon->tampil_diskon(),
            'produk' => $this->m_diskon->tampil_produk(),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/diskon/vtampil_diskon', $data);
        $this->load->view('admin/footer');
    }
    public function insert_diskon()
    {
        $this->m_diskon->insert_diskon();
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Disimpan');
        redirect('Admin/c_diskon');
    }
    public function delete($id_diskon)
    {
        $data = array(
            'diskon' => $this->m_diskon->delete($id_diskon)
        );
        redirect('Admin/c_diskon');
    }
    public function update($id_diskon)
    {
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_diskon' => $this->input->post('nama_diskon'),
            'besar_diskon' => $this->input->post('besar_diskon'),
            'level_member' => $this->input->post('level_member'),
            'tgl_selesai' => $this->input->post('tgl')

        );
        $this->db->where(array(
            'id_kategori' => $data['id_kategori'],
            'level_member' => $data['level_member']
        ));
        $this->db->update('diskon', $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui!!!');
        redirect('Admin/c_diskon');
    }
}
