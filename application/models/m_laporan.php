<?php
class m_laporan extends CI_Model
{
    //menampilkan jumlah total keuangan pada semua transaksi
    public function lap_order()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        return $this->db->get()->result();
    }
    //menampilkan jumlah order
    public function jumlah_transaksi()
    {
        $query = $this->db->query("SELECT * FROM transaksi");
        $jumlah = $query->num_rows();
        return $jumlah;
    }
    //menampilkan jumlah total keuangan pada transaksi yang sudah selesai
    public function lap_order_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=3');
        return $this->db->get()->result();
    }
    //query untuk menampilkan produk selesai dikirim
    public function jml_user()
    {
        $query = $this->db->query("SELECT * FROM user");
        $jumlah = $query->num_rows();
        return $jumlah;
    }

    //laporan jumlah order delivery
    public function jml_belum_bayar()
    {
        $status_pembayaran = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_pembayaran=', $status_pembayaran);
        return $this->db->get()->num_rows();
    }
    public function jml_konfirmasi()
    {
        $status_pembayaran = '1';
        $status_order = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_pembayaran=', $status_pembayaran);
        $this->db->where('status_order', $status_order);
        return $this->db->get()->num_rows();
    }
    public function jml_dikemas()
    {
        $status_pembayaran = '1';
        $status_order = '1';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        $this->db->where('status_pembayaran=', $status_pembayaran);
        return $this->db->get()->num_rows();
    }
    public function jml_dikirim()
    {
        $status_order = '2';
        $status_pembayaran = '1';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        $this->db->where('status_pembayaran=', $status_pembayaran);
        return $this->db->get()->num_rows();
    }

    //laporan jumlah order take in
    public function konfirmasi_takein()
    {
        $status_pembayaran = '3';
        $status_order = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        $this->db->where('status_pembayaran=', $status_pembayaran);
        return $this->db->get()->num_rows();
    }
    public function diproses_takein()
    {
        $status_pembayaran = '3';
        $status_order = '1';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        $this->db->where('status_pembayaran=', $status_pembayaran);
        return $this->db->get()->num_rows();
    }
    public function menunggu_takein()
    {
        $status_pembayaran = '3';
        $status_order = '2';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=', $status_order);
        $this->db->where('status_pembayaran=', $status_pembayaran);
        return $this->db->get()->num_rows();
    }



    //-------------laporan pdf------------------
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function kategori($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('produk', 'produk.id = kategori.id', 'left');
        $this->db->where('produk.id', $id);
        $data['kategori'] = $this->db->get()->result();
        $data['produk'] = $this->db->get_where('produk', array('id' => $id))->row();
        return $data;
    }
    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function diskon()
    {
        $diskon = '0';
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('kategori', 'diskon.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('produk', 'produk.id = kategori.id', 'left');
        $this->db->where('diskon.besar_diskon!=', $diskon);
        return $this->db->get()->result();
    }


    //---------laporan biasa------------
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        // $this->db->join('transaksi', 'transaksi.no_order = detail_order.no_order', 'left');
        // $this->db->join('diskon', 'diskon.id_diskon = detail_order.id_diskon', 'left');
        // $this->db->join('produk', 'diskon.id_produk = produk.id', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);

        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        // $this->db->join('transaksi', 'transaksi.no_order = detail_order.no_order', 'left');
        // $this->db->join('diskon', 'diskon.id_diskon = detail_order.id_diskon', 'left');
        // $this->db->join('produk', 'diskon.id_produk = produk.id', 'left');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        // $this->db->join('transaksi', 'transaksi.no_order = detail_order.no_order', 'left');
        // $this->db->join('diskon', 'diskon.id_diskon = detail_order.id_diskon', 'left');
        // $this->db->join('produk', 'diskon.id_produk = produk.id', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }
}
