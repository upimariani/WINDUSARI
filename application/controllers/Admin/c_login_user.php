<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_login_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_diskon');
    }
    public function login_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        if ($this->form_validation->run() == TRUE) {
            $tgl_diskon = $this->input->post('tgl_diskon');
            $data = array(
                'nama_diskon' => '0',
                'besar_diskon' => '0',
                'tgl_selesai' => '0'
            );
            $this->db->where('tgl_selesai<=', $tgl_diskon);
            $this->db->update('diskon', $data);
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }
        $this->load->view('admin/login/header');
        $this->load->view('admin/login/vlogin_user');
        $this->load->view('admin/login/footer');
        $this->user_login->cek_halaman();
    }
    public function logout_user()
    {
        $this->user_login->logout();
    }
}
