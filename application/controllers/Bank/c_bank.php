<?php
defined('BASEPATH') or exit('No direct script access allowed');


class c_bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bank');
    }
    public function index()
    {
        $this->load->view('bank/vpin');
    }
    public function login()
    {
        $this->form_validation->set_rules('pin', 'Pin', 'required', array(
            'pin' => '%s harus diisi'
        ));

        if ($this->form_validation->run() == TRUE) {
            $pin = $this->input->post('pin');
            $this->bank_login->login($pin);
        } else {
            redirect('bank/c_bank');
        }
    }

    public function pembayaran()
    {
        $this->load->view('bank/header');
        $this->load->view('bank/aside');
        $this->load->view('bank/vpembayaran');
        $this->load->view('bank/footer');
    }
    public function proses_pembayaran()
    {
        $kode_pembayaran = $this->input->post('kode_pembayaran');
        $data = array(
            'proses_pembayaran' => $this->m_bank->proses_pembayaran($kode_pembayaran)
        );
        $this->load->view('bank/header');
        $this->load->view('bank/aside');
        $this->load->view('bank/vtampil_pembayaran', $data);
        $this->load->view('bank/footer');
    }
    public function bayar($id_pelanggan, $no_order)
    {
        $data = array(
            'bayar' => $this->m_bank->bayar($id_pelanggan, $no_order),

        );
        $this->session->set_flashdata('pesan', 'Pembayaran Anda Sudah Valid!!!');
        redirect('bank/c_bank/pembayaran');
    }
    public function informasi()
    {
        $data['informasi'] = $this->m_bank->informasi_saldo();
        $this->load->view('bank/header');
        $this->load->view('bank/aside');
        $this->load->view('bank/vinformasi_rekening', $data);
        $this->load->view('bank/footer');
    }
    public function logout()
    {
        $this->bank_login->logout();
    }
    //kelola data nasabah
    public function insert_nasabah()
    {
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('pin', 'PIN', 'required');

        if ($this->form_validation->run() == false) {
            $data = array(
                'tampil' => $this->m_bank->tampil_data(),
                'pelanggan' => $this->m_bank->tampil_pelanggan()

            );
            $this->load->view('bank/header');
            $this->load->view('bank/aside_bank');
            $this->load->view('bank/vkelola_nasabah', $data);
            $this->load->view('bank/footer');
        } else {
            $data = array(
                'no_rekening' => $this->input->post('no_rekening'),
                'nama_bank' => $this->session->userdata('nama_user'), //nanti diambil dari session bank login
                'nama_nasabah' => $this->input->post('nama_nasabah'),
                'pin' => $this->input->post('pin'),
                'id_pelanggan' => $this->input->post('pelanggan')
            );
            $this->m_bank->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Nasabah Berhasil Ditambahkan!!!');
            redirect('bank/c_bank/insert_nasabah');
        }
    }
    public function insert_saldo($id_bank)
    {
        $data['insert'] = $this->m_bank->insert_saldo($id_bank);
        $this->session->set_flashdata('pesan', 'Saldo Berhasil Ditambahkan!!!');
        redirect('bank/c_bank/insert_nasabah');
    }
    public function delete($id_bank)
    {
        $data = array(
            'bank' => $this->m_bank->delete($id_bank)
        );
        $this->session->set_flashdata('pesan', 'No Rekening Berhasil Dihapus!!!');
        redirect('bank/c_bank/insert_nasabah');
    }
    public function edit($id_bank)
    {
        $data['bank'] = $this->m_bank->edit($id_bank);
        $this->session->set_flashdata('pesan', 'Data Rekening Berhasil Di Edit!!!');
        redirect('bank/c_bank/insert_nasabah');
    }
    public function logout_user()
    {
        $this->user_login->logout();
    }
}
