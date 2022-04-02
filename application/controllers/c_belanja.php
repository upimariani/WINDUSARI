<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_katalog');
        $this->load->model('m_transaksi');
    }

    //cart pelanggan
    public function index()
    {
        $data = array(
            'tittle' => 'Cart Pelanggan'
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vcart');
        $this->load->view('home/footer');
    }

    //tambah cart
    public function add()
    {
        $this->pelanggan_login->cek_halaman();
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'netto' => $this->input->post('netto'),
            'picture' => $this->input->post('picture'),
            'qty_produk' => $this->input->post('qty_produk'),
            'id_kategori' => $this->input->post('id_kategori')
        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    //hapus data cart
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('c_belanja');
    }

    //update data cart dengan menambah dan mengurangi jumlah barang
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('c_belanja');
    }
    public function cekout()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'tittle' => 'CekOut'
        );
        $this->load->view('home/head', $data);
        $this->load->view('home/header');
        $this->load->view('home/vcekout');
        $this->load->view('home/footer');
    }
    public function jasa_pengiriman()
    {
        $this->pelanggan_login->cek_halaman();
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('tlp_penerima', 'No Telepon', 'required|min_length[11]|max_length[13]|integer', array(
            'required' => '%s Harus Diisi',
            'min_length' => '%s Minimal 11 angka',
            'min_length' => '%s Maximal 13 angka',
            'integer' => '%s Harus Angka'
        ));
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('expedisi', 'Expedsisi', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('jalan', 'Jalan', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('desa', 'Desa', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('rt', 'RT', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('rw', 'RW', 'required', array(
            'required' => '%s Harus Diisi'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tittle' => 'CekOut'
            );
            $this->load->view('home/head', $data);
            $this->load->view('home/header');
            $this->load->view('home/vjasa_pengiriman');
        } else {

            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'no_telp' => $this->input->post('tlp_penerima'),
                'subtotal' => $this->input->post('subtotal'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_pembayaran' => '0',
                'status_order' => '0',
                'kode_pembayaran' => $this->input->post('pembayaran')
            );
            $this->m_transaksi->insert_transaksi($data);

            //mengurangi qty_produk
            foreach ($this->cart->contents() as $key => $value) {
                $tot = 0;
                $data_qty = array(
                    'id_kategori' => $value['id_kategori'],
                    'qty' => $value['qty'],
                    'qty_produk' => $value['qty_produk']
                );
                $tot = $data_qty['qty_produk'] - $data_qty['qty'];
                $isi['qty_produk'] = $tot;
                $this->db->where('id_kategori', $data_qty['id_kategori']);
                $this->db->update('kategori', $isi);
            }
            //simpan ke data review
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $review = array(
                    'id_diskon' => $item['id'],
                    'no_order' => $this->input->post('no_order'),
                    'isi_review' => '0'
                );
                $this->m_transaksi->review($review);
            }

            //simpan data ke detail transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_diskon' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++)
                );
                $this->m_transaksi->insert_detail($data_rinci);
            }

            $alamat = $this->input->post('alamat');
            $jalan = $this->input->post('jalan');
            $rt = $this->input->post('rt');
            $rw = $this->input->post('rw');
            $desa = $this->input->post('desa');

            $jasa_pengiriman = array(
                'no_order' => $this->input->post('no_order'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $jalan . ' - ' . $alamat . ' RT ' . $rt . ' RW ' . $rw . 'Desa/Kelurahan' . $desa,
                'kode_pos' => $this->input->post('kode_pos'),
                'nama_expedisi' => $this->input->post('expedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat')
            );
            $this->m_transaksi->insert_jasa_pengiriman($jasa_pengiriman);
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil di Proses !!!');
            $this->cart->destroy();
            redirect('c_pesanan_pelanggan');
        }
    }
    public function take_in()
    {
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tittle' => 'Take In Produk'
            );
            $this->load->view('home/head', $data);
            $this->load->view('home/header');
            $this->load->view('home/vtake_in');
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'no_telp' => $this->input->post('no_telp'),
                'subtotal' => $this->input->post('subtotal'),
                'total_bayar' => $this->input->post('subtotal'),
                'kode_pembayaran' => 'cod',
                'no_resi' => '-',
                'status_pembayaran' => '3',
                'status_order' => '0',
            );
            $this->m_transaksi->insert_transaksi($data);
            //mengurangi qty_produk
            foreach ($this->cart->contents() as $key => $value) {
                $tot = 0;
                $data_qty = array(
                    'id_kategori' => $value['id_kategori'],
                    'qty' => $value['qty'],
                    'qty_produk' => $value['qty_produk']
                );
                $tot = $data_qty['qty_produk'] - $data_qty['qty'];
                $isi['qty_produk'] = $tot;
                $this->db->where('id_kategori', $data_qty['id_kategori']);
                $this->db->update('kategori', $isi);
            }

            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $review = array(
                    'id_diskon' => $item['id'],
                    'no_order' => $this->input->post('no_order'),
                    'isi_review' => '0'
                );
                $this->m_transaksi->review($review);
            }

            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_diskon' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++)
                );
                $this->m_transaksi->insert_detail($data_rinci);
            }
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil di Proses !!!');
            $this->cart->destroy();
            redirect('c_pesanan_pelanggan');
        }
    }
}
