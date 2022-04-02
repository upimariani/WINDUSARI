<?php
defined('BASEPATH') or exit('No direct script access allowed');


class c_katalog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_katalog');
    }

    //awal tampilan
    public function index()
    {
        $isi = array(
            'tittle' => 'Katalog Produk',
            'produk' => $this->m_katalog->selectAll(),
            'trending' => $this->m_katalog->katalog_trending()
        );
        $this->load->view('home/head', $isi);
        $this->load->view('home/header', $isi);
        $this->load->view('home/slider');
        $this->load->view('home/vkatalog', $isi);
        $this->load->view('home/footer');
    }
    public function shopgrid()
    {
        $isi = array(
            'tittle' => 'Shop Grid',
            'produk' => $this->m_katalog->selectAll(),
            'rank' => $this->m_katalog->rank_produk()
        );
        $this->load->view('home/head', $isi);
        $this->load->view('home/header');
        $this->load->view('home/vshopgrid', $isi);
        $this->load->view('home/footer');
    }

    public function detail_produk($id)
    {
        $data = array(
            'tittle' => 'Detail Produk',
            'detail' => $this->m_katalog->detail_produk($id)
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vdetail_produk', $data);
        $this->load->view('home/footer');
    }
    //akun pelanggan 
    public function profil()
    {
        $this->pelanggan_login->cek_halaman();
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('email', 'Nama Depan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('username', 'Nama Depan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tittle' => 'Profil Pelanggan',
                'akun' => $this->m_katalog->akun_pelanggan()
            );
            $this->load->view('home/head', $data);
            $this->load->view('home/header');
            $this->load->view('home/vakun_pelanggan');
            $this->load->view('home/footer');
        } else {
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->db->where('id_pelanggan', $data['id_pelanggan']);
            $this->db->update('pelanggan', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui!!!');
            redirect('c_katalog/profil');
        }
    }
}
