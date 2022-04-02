<?php
defined('BASEPATH') or exit('No direct script access allowed');


class c_pesanan_pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'tittle' => 'Pesanan Anda',
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'menunggu_konfirmasi' => $this->m_transaksi->menunggu_konfirmasi(),
            'dikemas' => $this->m_transaksi->dikemas(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->pesanan_selesai()
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vpesanan_pelanggan', $data);
        $this->load->view('home/footer');
    }
    public function dibatalkan($no_order)
    {
        $data = array(
            'dibatalkan' => $this->m_transaksi->dibatalkan($no_order)
        );
        redirect('c_pesanan_pelanggan');
    }
    public function detail_pemesanan($no_order)
    {
        $data = array(
            'tittle' => 'Detail Pesanan Anda',
            'detail' => $this->m_transaksi->detail_pesanan($no_order)
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vdetail_pemesanan', $data);
        $this->load->view('home/footer');
    }
    public function tracking($no_order)
    {
        $data = array(
            'tittle' => 'Tracking',
            'tracking' => $this->m_transaksi->tracking($no_order)
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vtracking', $data);
        $this->load->view('home/footer');
    }
    public function pesanan_diterima($no_order)
    {
        $data['selesai'] = $this->m_transaksi->pesanan_diterima($no_order);
        redirect('c_pesanan_pelanggan');
    }
    public function review($no_order)
    {
        $data = array(
            'tittle' => 'Pesanan Anda',
            'review' => $this->m_transaksi->produk_review($no_order)

        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vreview_produk', $data);
        $this->load->view('home/footer');
    }
    public function insert_review($id_review)
    //update review
    //point 2% dari jumlah pembelian
    //update member jika point sudah 10000 point
    {
        $update_point = 0;
        $data = array(
            'total' => $this->input->post('total'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'point_sebelum' => $this->input->post('point')

        );
        $point = 2 / 100 * $data['total'];
        $update_point = $data['point_sebelum'] + $point;
        if ($update_point <= 1000) {
            $member = array(
                'level_member' => '3',
                'point' => $update_point
            );
        } else if ($update_point < 100000) {
            $member = array(
                'level_member' => '2',
                'point' => $update_point
            );
        } else if ($update_point >= 100000) {
            $member = array(
                'level_member' => '1',
                'point' => $update_point
            );
        }
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan', $member);
        $data['insert'] = $this->m_transaksi->insert_review($id_review);
        $data['no_order'] = $this->input->post('no_order');
        redirect('c_pesanan_pelanggan/review/' . $data['no_order']);
    }
}
