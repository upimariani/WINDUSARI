<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_order_delivery');
        $this->load->model('m_order_takein');
        $this->load->model('m_laporan');
        $this->load->model('m_chatting');
    }
    //menampilkan data order delivery
    public function index()
    {
        $data = array(
            'title' => 'Data Order',
            'belumbayar' => $this->m_order_delivery->lap_belumbayar(),
            'lap_konfirmasi' => $this->m_order_delivery->lap_konfirmasi(),
            'diproses' => $this->m_order_delivery->proses_produk(),
            'dikirim' => $this->m_order_delivery->dikirim(),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order/vtampil_order', $data);
        $this->load->view('admin/footer');
    }
    public function detail_order_delivery($no_order)
    {
        $data = array(
            'title' => 'Detail Order',
            'detail_order' => $this->m_order_delivery->detail_order($no_order),
            'data_order' => $this->m_order_delivery->data_order($no_order),
            'tampil_chat' => $this->m_chatting->select_chatting()

        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order/vdetail_order_delivery', $data);
        $this->load->view('admin/footer');
    }
    public function proses_konfirmasi($no_order)
    {
        $this->m_order_delivery->konfirmasi_pembayaran($no_order);
        redirect('Admin/c_order');
    }
    public function kirim($no_order)
    {
        $data = array(
            'no_resi' => $this->m_order_delivery->kirim_barang($no_order)
        );
        redirect('Admin/c_order');
    }
    public function view_json($no_order)
    {
        $jasa_pengiriman =  $this->db->get_where('jasa_pengiriman', array('jasa_pengiriman.no_order' => $no_order))->row();
        $data_view['view_tracking'] = $this->m_order_delivery->view_tracking($jasa_pengiriman->id_jasa_pengiriman);
        header('Content-Type: application/json');
        echo json_encode($data_view);
    }
    public function selesai()
    {
        $data = array(
            'title' => 'Produk Selesai Dikirim',
            'lap_order' => $this->m_laporan->lap_order(),
            'jumlah' => $this->m_laporan->jumlah_transaksi(),
            'lap_selesai' => $this->m_laporan->lap_order_selesai(),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order/vorder_selesai', $data);
        $this->load->view('admin/footer');
    }

    //menampilkan data order takein
    public function take_in()
    {
        $data = array(
            'title' => 'Data Order Take In',
            'konfirmasi_takein' => $this->m_order_takein->konfirmasi_takein(),
            'proses' => $this->m_order_takein->proses(),
            'takein' => $this->m_order_takein->menunggu_takein(),
            'selesai' => $this->m_order_takein->selesai(),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order/vorder_takein', $data);
        $this->load->view('admin/footer');
    }
    public function konfirmasi($no_order)
    {
        $this->m_order_takein->update_konfirmasi($no_order);
        redirect('Admin/c_order/take_in');
    }
    public function detail_order_takein($no_order)
    {
        $data = array(
            'title' => 'Detail Order Take In',
            'proses' => $this->m_order_takein->proses($no_order),
            'detail_order' => $this->m_order_takein->detail_order($no_order),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order/vdetail_order_takein', $data);
        $this->load->view('admin/footer');
    }
    public function update_menunggu($no_order)
    {
        $data['menunggu'] = $this->m_order_takein->update_menunggu($no_order);
        redirect('Admin/c_order/take_in');
    }
    public function selesai_takein($no_order)
    {
        $data['menunggu'] = $this->m_order_takein->update_selesai($no_order);
        redirect('Admin/c_order/take_in');
    }

    public function laporan()
    {
        $data = array(
            'title' => 'Data Laporan Penjualan',
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order/vlaporan', $data);
        $this->load->view('admin/footer');
    }
}
