<?php
class m_order_delivery extends CI_Model
{
    //query admin untuk pelanggan yang belum melakukan pembayaran
    public function lap_belumbayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('jasa_pengiriman', 'transaksi.no_order = jasa_pengiriman.no_order', 'left');
        $this->db->where('transaksi.status_pembayaran=0');
        $this->db->order_by('transaksi.no_order', 'desc');
        return $this->db->get()->result();
    }
    //query admin untuk pelanggan yang sudah melakukan pembayaran dan menunggu konfirmasi admin
    public function lap_konfirmasi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.no_order = detail_order.no_order', 'inner');
        $this->db->where('status_pembayaran=1 AND status_order=0');
        $this->db->group_by('detail_order.no_order');
        return $this->db->get()->result();
    }
    public function konfirmasi_pembayaran($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'status_order' => '1'
        );
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Konfirmasi Berhasil, Segera Proses Pemesanan');
    }
    //query admin untuk menampilkan data pesanan pelanggan yang harus di proses
    public function proses_produk()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=1 AND status_pembayaran=1');
        return $this->db->get()->result();
    }
    //query admin untuk menampilkan detail data order
    public function data_order($no_order)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('jasa_pengiriman', 'transaksi.no_order = jasa_pengiriman.no_order', 'left');
        $this->db->where('transaksi.no_order', $no_order);
        return $this->db->get()->result();
    }
    //query admin untuk menampilkan detail barang apa saja yang dipesan
    public function detail_order($no_order)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.no_order = detail_order.no_order', 'left');
        $this->db->join('diskon', 'detail_order.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('kategori', 'diskon.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('produk', 'kategori.id = produk.id', 'left');
        $this->db->where('transaksi.no_order', $no_order);
        return $this->db->get()->result();
    }
    //query update no_resi 
    public function kirim_barang($no_order)
    {
        $data = array(
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2'
        );
        $this->db->where('no_order', $no_order);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Data No Resi Berhasil di Update!!!<br>Produk Segera Dikirim!!!');
    }
    //query untuk menampilkan data yang sedang dikirim
    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('jasa_pengiriman', 'transaksi.no_order = jasa_pengiriman.no_order', 'left');
        $this->db->where('transaksi.status_order=2 AND transaksi.status_pembayaran=1');
        return $this->db->get()->result();
    }
    public function view_tracking($id_jasa_pengiriman)
    {
        $this->db->select('*');
        $this->db->from('jasa_pengiriman');
        $this->db->join('tracking', 'jasa_pengiriman.id_jasa_pengiriman = tracking.id_jasa_pengiriman', 'left');
        $this->db->where('jasa_pengiriman.id_jasa_pengiriman', $id_jasa_pengiriman);
        return $this->db->get()->result();
    }
}
