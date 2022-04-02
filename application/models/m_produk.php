<?php
class m_produk extends CI_Model
{
    //menampilkan data produk
    public function select_all_data()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }

    //memasukkan data ke tabel produk
    public function insert_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function insert_diskon($data)
    {
        $this->db->insert('diskon', $data);
    }

    //menghapus data produk
    public function delete($id)
    {
        $_id = $this->db->get_where('produk', ['id' => $id])->row();
        $query = $this->db->delete('produk', ['id' => $id]);
        if ($query) {
            unlink("asset/gambar/" . $_id->gambar);
        }
    }
    //data kategori
    public function kategori($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id = produk.id', 'left');
        $this->db->where('produk.id', $id);
        $data['kategori'] = $this->db->get()->result();
        $data['produk'] = $this->db->get_where('produk', array('id' => $id))->row();
        return $data;
    }
    public function jml_produk()
    {
        $query = $this->db->get('produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jml_kategori($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');

        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
