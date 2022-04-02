<?php
class m_order_takein extends CI_Model
{
    public function konfirmasi_takein()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=0 AND status_pembayaran=3');
        return $this->db->get()->result();
    }
    public function update_konfirmasi($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'status_order' => '1'
        );
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Konfirmasi Berhasil, Segera Proses Pemesanan');
    }
    public function proses($no_order = 0)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=1 AND status_pembayaran=3');
        $data['detail'] = $this->db->where('no_order', $no_order);
        $data['proses'] = $this->db->get()->result();
        return $data;
    }
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
    public function update_menunggu($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'status_order' => '2'
        );
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Produk Selesai Dikemas, Menunggu Take In');
    }
    public function menunggu_takein()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=2 AND status_pembayaran=3');
        return $this->db->get()->result();
    }
    public function update_selesai($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'status_order' => '3'
        );
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata('pesan', 'Produk Selesai Dikemas, Menunggu Take In');
    }
    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=3 AND status_pembayaran=3');
        return $this->db->get()->result();
    }
}
