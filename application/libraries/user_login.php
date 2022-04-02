<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login_user');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login_user->login_user($username, $password);
        if ($cek) {
            $nama_user = $cek->nama_user;
            $username = $cek->username;
            $level_user = $cek->level_user;
            $id_user = $cek->id_user;

            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level_user', $level_user);
            $this->ci->session->set_userdata('id_user', $id_user);


            if ($level_user == 1) {
                redirect('Admin/c_dasboard');
            } else if ($level_user == '2') {
                redirect('Jasa_Pengiriman/c_jasa_pengiriman');
            } else if ($level_user == '3') {
                redirect('Jasa_Pengiriman/c_jasa_pengiriman');
            } else if ($level_user == '4') {
                redirect('Jasa_Pengiriman/c_jasa_pengiriman');
            } else if ($level_user == '5') {
                redirect('bank/c_bank/insert_nasabah');
            }
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('Admin/c_login_user/login_user');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('Admin/c_login_user/login_user');
    }
}

/* End of file user_login.php */
