<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_laporan');
        $this->load->model('m_chatting');
    }
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'user' => $this->m_user->select_all_user(),
            'jml_user' => $this->m_laporan->jml_user(),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/user/vtampil_user', $data);
        $this->load->view('admin/user/vtambah_user');
        $this->load->view('admin/footer');
    }
    // Add a new item
    public function insert()
    {
        $data = array(
            'user' => $this->m_user->insert_user()
        );
        redirect('Admin/c_user');
    }


    //Delete one item
    public function delete($id_user)
    {
        $data = array(
            'user' => $this->m_user->delete($id_user)
        );
        redirect('Admin/c_user');
    }

    public function edit($id_user)
    {
        $data = array(
            'user' => $this->m_user->update($id_user)
        );
        $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui!!!');
        redirect('Admin/c_user');
    }
}
