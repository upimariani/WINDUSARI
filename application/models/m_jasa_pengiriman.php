<?php
class m_jasa_pengiriman extends CI_Model
{
    public function tampil_data()
    {
        $data = $this->session->userdata('nama_user');
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('jasa_pengiriman', 'transaksi.no_order = jasa_pengiriman.no_order', 'left');
        $this->db->where('transaksi.status_order=2');
        $this->db->where('jasa_pengiriman.nama_expedisi=', $data);
        return $this->db->get()->result();
    }
    public function insert_status_pengiriman($data)
    {
        $this->db->insert('tracking', $data);
    }
    public function view_tracking($id_jasa_pengiriman)
    {
        $this->db->select('*');
        $this->db->from('jasa_pengiriman');
        $this->db->join('tracking', 'jasa_pengiriman.id_jasa_pengiriman = tracking.id_jasa_pengiriman', 'left');
        $this->db->where('jasa_pengiriman.id_jasa_pengiriman', $id_jasa_pengiriman);
        return $this->db->get()->result();
    }
    public function jumlah_pengguna()
    {
        $data = $this->session->userdata('nama_user');
        $query = $this->db->query("SELECT * FROM jasa_pengiriman join transaksi on jasa_pengiriman.no_order=transaksi.no_order where transaksi.status_order=2 AND jasa_pengiriman.nama_expedisi='" . $data . "'");
        $jumlah = $query->num_rows();
        return $jumlah;
    }
}
