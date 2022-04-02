<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login_pelanggan');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login_pelanggan->login_pelanggan($username, $password);
        if ($cek) {
            $nama_depan = $cek->nama_depan;
            $username = $cek->username;
            $foto = $cek->foto;
            $id_pelanggan = $cek->id_pelanggan;
            $level_member = $cek->level_member;

            //session
            $this->ci->session->set_userdata('nama_depan', $nama_depan);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('foto', $foto);
            $this->ci->session->set_userdata('level_member', $level_member);

            redirect('c_katalog');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('c_login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('nama_depan') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');
            redirect('c_login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_depan');
        $this->ci->session->unset_userdata('foto');
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('level_member');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('c_login');
    }
}

/* End of file user_login.php */
