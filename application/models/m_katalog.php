<?php
class m_katalog extends CI_Model
{
    public function akun_pelanggan()
    {
        $id = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id);
        return $this->db->get()->result();
    }
    public function katalog_trending()
    {
        if ($this->session->userdata('level_member') == '') {
            $query = $this->db->query("SELECT SUM(qty) as tot, kategori.id_kategori , qty_produk, nama_produk, harga_produk, besar_diskon, berat_produk, produk.id, diskon.id_diskon, gambar FROM detail_order JOIN diskon ON detail_order.id_diskon = diskon.id_diskon JOIN kategori ON diskon.id_kategori = kategori.id_kategori JOIN produk ON kategori.id = produk.id WHERE kategori.berat_produk='250' AND diskon.level_member='3' GROUP BY produk.id ORDER BY tot DESC")->result();
            return $query;
        } else {
            $query = $this->db->query("SELECT SUM(qty) as tot, kategori.id_kategori, qty_produk, nama_produk, harga_produk, besar_diskon, berat_produk, produk.id, diskon.id_diskon, gambar FROM detail_order JOIN diskon ON detail_order.id_diskon = diskon.id_diskon JOIN kategori ON diskon.id_kategori = kategori.id_kategori JOIN produk ON kategori.id = produk.id WHERE kategori.berat_produk='250' AND diskon.level_member='" . $this->session->userdata('level_member') . "' GROUP BY produk.id ORDER BY tot DESC")->result();
            return $query;
        }
    }
    public function rank_produk()
    {
        $query = $this->db->query("SELECT SUM(qty) as tot, Round(AVG(nilai_rating)) as rating, nama_produk, harga_produk, besar_diskon, diskon.id_diskon, gambar FROM detail_order JOIN diskon ON detail_order.id_diskon = diskon.id_diskon JOIN kategori ON diskon.id_kategori = kategori.id_kategori JOIN produk ON kategori.id = produk.id JOIN rating ON produk.id=rating.id WHERE kategori.berat_produk='250' GROUP BY produk.id ORDER BY tot DESC LIMIT 3")->result();
        return $query;
    }
    public function selectAll()
    {
        if ($this->session->userdata('level_member') == '') {
            if ($pencarian = $this->input->post('search')) {
                $this->db->select('*');
                $this->db->from('diskon');
                $this->db->join('kategori', 'kategori.id_kategori = diskon.id_kategori', 'left');
                $this->db->join('produk', 'kategori.id = produk.id', 'left');
                $this->db->where('kategori.berat_produk=250');
                $this->db->where('diskon.level_member=3');
                $this->db->like('produk.nama_produk', $pencarian);
                return $this->db->get()->result();
            } else {
                $this->db->select('*');
                $this->db->from('diskon');
                $this->db->join('kategori', 'kategori.id_kategori = diskon.id_kategori', 'left');
                $this->db->join('produk', 'kategori.id = produk.id', 'left');
                $this->db->where('kategori.berat_produk=250');
                $this->db->where('diskon.level_member=3');
                return $this->db->get()->result();
            }
        } else {
            if ($pencarian = $this->input->post('search')) {
                $this->db->select('*');
                $this->db->from('diskon');
                $this->db->join('kategori', 'kategori.id_kategori = diskon.id_kategori', 'left');
                $this->db->join('produk', 'kategori.id = produk.id', 'left');
                $this->db->where('kategori.berat_produk=250');
                $this->db->where('diskon.level_member=', $this->session->userdata('level_member'));
                $this->db->like('produk.nama_produk', $pencarian);
                return $this->db->get()->result();
            } else {
                $this->db->select('*');
                $this->db->from('diskon');
                $this->db->join('kategori', 'kategori.id_kategori = diskon.id_kategori', 'left');
                $this->db->join('produk', 'kategori.id = produk.id', 'left');
                $this->db->where('kategori.berat_produk=250');
                $this->db->where('diskon.level_member=', $this->session->userdata('level_member'));
                return $this->db->get()->result();
            }
        }
    }

    public function detail_produk($id)
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('kategori', 'kategori.id_kategori = diskon.id_kategori', 'left');
        $this->db->join('produk', 'kategori.id = produk.id', 'left');
        $this->db->where('produk.id', $id);
        $data['produk'] = $this->db->get()->row();
        if ($this->session->userdata('level_member') == '') {
            $data['kategori'] = $this->db->query("SELECT * FROM diskon JOIN kategori ON diskon.id_kategori=kategori.id_kategori JOIN produk ON produk.id = kategori.id WHERE diskon.level_member=3 AND produk.id = '" . $id . "'")->result();
            $data['rating'] = $this->db->query("SELECT Round(avg(nilai_rating)) as rating FROM rating join produk on rating.id = produk.id where produk.id= '" . $id . " 'AND rating.nilai_rating !='0' GROUP BY produk.id")->row();
            $data['review'] = $this->db->query("SELECT * FROM diskon JOIN kategori ON diskon.id_kategori=kategori.id_kategori JOIN produk ON kategori.id=produk.id JOIN review ON diskon.id_diskon = review.id_diskon JOIN transaksi ON transaksi.no_order = review.no_order JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE produk.id= '" . $id . "' AND review.isi_review != '0'")->result();
            $data['jml_review'] = $this->db->query("SELECT * FROM diskon JOIN kategori ON diskon.id_kategori=kategori.id_kategori JOIN produk ON kategori.id=produk.id JOIN review ON diskon.id_diskon = review.id_diskon JOIN transaksi ON transaksi.no_order = review.no_order JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE produk.id= '" . $id . "' AND review.isi_review != '0'")->num_rows();
        } else {
            $data['kategori'] = $this->db->query("SELECT * FROM diskon JOIN kategori ON diskon.id_kategori=kategori.id_kategori JOIN produk ON produk.id = kategori.id WHERE diskon.level_member=" .
                $this->session->userdata('level_member')
                . " AND produk.id = '" . $id . "'")->result();
            $data['rating'] = $this->db->query("SELECT Round(avg(nilai_rating)) as rating FROM rating join produk on rating.id = produk.id where produk.id= '" . $id . "'AND rating.nilai_rating !='0' GROUP BY produk.id")->row();
            $data['review'] = $this->db->query("SELECT * FROM diskon JOIN kategori ON diskon.id_kategori=kategori.id_kategori JOIN produk ON kategori.id=produk.id JOIN review ON diskon.id_diskon = review.id_diskon JOIN transaksi ON transaksi.no_order = review.no_order JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE produk.id= '" . $id . "' AND review.isi_review != '0' ")->result();
            $data['jml_review'] = $this->db->query("SELECT * FROM diskon JOIN kategori ON diskon.id_kategori=kategori.id_kategori JOIN produk ON kategori.id=produk.id JOIN review ON diskon.id_diskon = review.id_diskon JOIN transaksi ON transaksi.no_order = review.no_order JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE produk.id= '" . $id . "' AND review.isi_review != '0'")->num_rows();
        }
        return $data;
    }
}
