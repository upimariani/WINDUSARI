<?php
class m_transaksi extends CI_Model
{
    //insert tabel transaksi
    public function insert_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }
    //insert tabel jasa pengiriman
    public function insert_jasa_pengiriman($jasa_pengiriman)
    {
        $this->db->insert('jasa_pengiriman', $jasa_pengiriman);
    }
    //insert detail barang order
    public function insert_detail($data_rinci)
    {
        $this->db->insert('detail_order', $data_rinci);
    }
    //insert tabel review
    public function review($data)
    {
        $this->db->insert('review', $data);
    }

    //status produk dan status pengiriman
    public function belum_bayar()
    {
        $id = $this->session->userdata['id_pelanggan'];
        $this->db->select('*');
        $this->db->where('status_pembayaran=0');
        $this->db->where('transaksi.id_pelanggan', $id);
        $this->db->from('transaksi');

        return $this->db->get()->result();
    }
    public function dibatalkan($no_order)
    {
        $data = array(
            'status_order' => '9',
            'status_pembayaran' => '9'
        );
        $this->db->where('no_order', $no_order);
        $this->db->update('transaksi', $data);
    }
    public function detail_pesanan($no_order)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.no_order = detail_order.no_order', 'left');
        $this->db->join('diskon', 'detail_order.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('kategori', 'diskon.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('produk', 'kategori.id = produk.id', 'left');
        $this->db->where('transaksi.no_order', $no_order);
        $data['detail'] = $this->db->get()->result();
        $data['data'] = $this->db->query("SELECT * FROM transaksi where no_order='" . $no_order . "'")->row();
        return $data;
    }
    public function menunggu_konfirmasi()
    {
        $id = $this->session->userdata['id_pelanggan'];
        $this->db->select('*');
        $this->db->where('status_pembayaran in (1, 3) AND status_order=0');
        $this->db->where('id_pelanggan', $id);
        $this->db->from('transaksi');
        return $this->db->get()->result();
    }
    public function dikemas()
    {
        $id = $this->session->userdata['id_pelanggan'];
        $this->db->select('*');
        $this->db->where('status_pembayaran in (1, 3) AND status_order in (1, 4)');
        $this->db->where('id_pelanggan', $id);
        $this->db->from('transaksi');
        return $this->db->get()->result();
    }
    public function dikirim()
    {
        $id = $this->session->userdata['id_pelanggan'];
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('jasa_pengiriman', 'transaksi.no_order = jasa_pengiriman.no_order', 'left');
        $this->db->where('status_order=2');
        $this->db->where('id_pelanggan', $id);
        return $this->db->get()->result();
    }
    public function pesanan_diterima($no_order)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->db->where('no_order', $no_order);
        $this->db->update('transaksi', $data);
    }
    public function pesanan_selesai()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=3');
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }
    public function produk_review($no_order)
    {
        $review = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_order', 'transaksi.no_order = detail_order.no_order', 'left');
        $this->db->join('diskon', 'detail_order.id_diskon = diskon.id_diskon', 'left');
        $this->db->join('kategori', 'diskon.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('produk', 'kategori.id = produk.id', 'left');
        $this->db->join('review', 'diskon.id_diskon = review.id_diskon', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('transaksi.no_order', $no_order);
        $this->db->where('review.no_order', $no_order);
        $this->db->where('review.isi_review=', $review);
        return $this->db->get()->result();
    }
    public function rating_select()
    {
        $this->db->select('Round(avg(nilai_rating)) as rating, id');
        $this->db->from('rating');
        $this->db->group_by('id');
        return $this->db->get()->result();
    }
    public function insert_review($id_review)
    {
        $data = array(
            'isi_review' => $this->input->post('isi_review')
        );
        $this->db->where('id_review', $id_review);
        $this->db->update('review', $data);

        $rating = array(
            'id' => $this->input->post('id'),
            'nilai_rating' => $this->input->post('rating')
        );
        $this->db->insert('rating', $rating);
    }
    public function tracking($no_order)
    {
        $this->db->select('*');
        $this->db->from('jasa_pengiriman');
        $this->db->join('tracking', 'jasa_pengiriman.id_jasa_pengiriman = tracking.id_jasa_pengiriman', 'left');
        $this->db->where('jasa_pengiriman.no_order=', $no_order);
        $data['tracking'] = $this->db->get()->result();
        $data['data'] = $this->db->get('jasa_pengiriman')->row();
        return $data;
    }
}
