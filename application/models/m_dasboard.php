<?php
class m_dasboard extends CI_Model
{
    public function hitungJumlahAsset()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function lap_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id = kategori.id', 'left');
        return $this->db->get()->result();
    }
    public function tot_order()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        return $this->db->get()->num_rows();
    }
    public function tot_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->num_rows();
    }
}
