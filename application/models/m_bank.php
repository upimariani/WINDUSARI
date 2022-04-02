<?php
class m_bank extends CI_Model
{
    public function login($pin)
    {
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->where(array(
            'pin' => $pin
        ));
        return $this->db->get()->row();
    }
    public function proses_pembayaran($kode_pembayaran)
    {
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->join('pelanggan', 'bank.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('transaksi', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->like('transaksi.kode_pembayaran', $kode_pembayaran);
        $this->db->where('transaksi.status_pembayaran=0');
        return $this->db->get()->result();
    }
    public function bayar($id_pelanggan, $no_order)
    {
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'no_order' => $no_order,
            'status_pembayaran' => '1'

        );
        $isi['nominal'] = (int)$this->input->post('nominal_bayar');
        $isi['saldo'] = (int)$this->input->post('saldo');
        $data['saldo'] = $isi['saldo'] - $isi['nominal'];

        // first 
        $this->db->set('a.status_pembayaran', $data['status_pembayaran']);
        $this->db->where('a.no_order',  $no_order);
        $this->db->update('transaksi as a');
        // second
        $this->db->set('b.saldo', $data['saldo']);
        $this->db->where('b.id_pelanggan',  $id_pelanggan);
        $this->db->update('bank as b');
    }
    public function informasi_saldo()
    {
        $data = $this->session->userdata('no_rekening');
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->where('no_rekening', $data);
        return $this->db->get()->result();
    }

    //bank kelola data nasabah
    public function insert_data($data)
    {
        $this->db->insert('bank', $data);
    }
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('bank');
        return $this->db->get()->result();
    }
    public function tampil_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        return $this->db->get()->result();
    }
    public function insert_saldo($id_bank)
    {
        $hasil = 0;
        $jumlah['saldo'] = $this->input->post('saldo');
        $jumlah['nominal'] = $this->input->post('nominal');
        $hasil = $jumlah['saldo'] + $jumlah['nominal'];
        $data = array(
            'saldo' => $hasil
        );
        $this->db->where('id_bank', $id_bank);
        $this->db->update('bank', $data);
    }
    public function delete($id_bank)
    {
        $this->db->where('id_bank', $id_bank);
        $this->db->delete('bank');
    }
    public function edit($id_bank)
    {
        $data = array(
            'no_rekening' => $this->input->post('no_rekening'),
            'nama_nasabah' => $this->input->post('nama_nasabah'),
            'pin' => $this->input->post('pin'),
            'id_pelanggan' => $this->input->post('pelanggan')
        );
        $this->db->where('id_bank', $id_bank);
        $this->db->update('bank', $data);
    }
}
