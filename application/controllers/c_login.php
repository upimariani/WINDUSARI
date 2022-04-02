<?php
defined('BASEPATH') or exit('No direct script access allowed');


class c_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }

    //login pelanggan
    public function index()
    {
        $data = array(
            'tittle' => 'Login Pelanggan'
        );
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($username, $password);
        } else {
            $this->load->view('login/header', $data);
            $this->load->view('login/v_login');
        }
    }

    //register pelanggan
    public function register()
    {
        $data = array(
            'tittle' => 'Register Pelanggan'
        );
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[pelanggan.email]', array(
            'required' => '%s Harus Diisi',
            'is_unique' => '%s Harus Unique'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('retry_password', 'Retry Password', 'required|matches[password]', array(
            'required' => '%s Harus Diisi',
            'matches' => '%s Password Tidak Sesuai'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('login/header', $data);
            $this->load->view('login/v_register');
        } else {
            $data = array(
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'level_member' => '3'
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Berhasil Register');
            redirect('c_login');
        }
    }

    //logout pelanggan
    public function logout()
    {
        $this->pelanggan_login->logout();
    }
}
