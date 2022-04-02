<?php
class m_diskon extends CI_Model
{
    public function tampil_diskon()
    {
        $diskon = '0';
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('kategori', 'diskon.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('produk', 'kategori.id = produk.id', 'left');
        $this->db->where('diskon.nama_diskon !=', $diskon);
        return $this->db->get()->result();
    }
    public function tampil_produk()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('produk', 'kategori.id = produk.id', 'left');
        return $this->db->get()->result();
    }
    public function insert_diskon()
    {
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_diskon' => $this->input->post('nama_diskon'),
            'besar_diskon' => $this->input->post('besar_diskon'),
            'level_member' => $this->input->post('level_member'),
            'tgl_selesai' => $this->input->post('tgl')

        );
        $this->db->where(array(
            'id_kategori' => $data['id_kategori'],
            'level_member' => $data['level_member']
        ));
        $this->db->update('diskon', $data);
    }
    public function delete($id_diskon)
    {
        $data = array(
            'nama_diskon' => '0',
            'besar_diskon' => '0',
            'level_member' => '0',
            'tgl_selesai' => '0'
        );
        $this->db->where('id_diskon', $id_diskon);
        $this->db->update('diskon', $data);
        $this->session->set_flashdata('delete', 'Data Diskon Berhasil Dihapus');
    }
    public function diskon()
    {
        $this->db->select('*');
        $this->db->from('diskon');
        return $this->db->get()->result();
    }
}
