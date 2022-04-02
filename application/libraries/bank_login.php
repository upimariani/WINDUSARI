<?php

defined('BASEPATH') or exit('No direct script access allowed');

class bank_login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_bank');
    }
    public function login($pin)
    {
        $cek = $this->ci->m_bank->login($pin);
        if ($cek) {
            $no_rekening = $cek->no_rekening;
            $nama_nasabah = $cek->nama_nasabah;
            $saldo = $cek->saldo;
            $pin = $cek->pin;

            $this->ci->session->set_userdata('no_rekening', $no_rekening);
            $this->ci->session->set_userdata('nama_nasabah', $nama_nasabah);
            $this->ci->session->set_userdata('saldo', $saldo);
            $this->ci->session->set_userdata('pin', $pin);

            redirect('bank/c_bank/pembayaran');
        } else {
            $this->ci->session->set_flashdata('error', 'Pin Salah');
            redirect('bank/c_bank');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('no_rekening');
        $this->ci->session->unset_userdata('nama_nasabah');
        $this->ci->session->unset_userdata('saldo');
        $this->ci->session->unset_userdata('pin');

        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('bank/c_bank');
    }
}
