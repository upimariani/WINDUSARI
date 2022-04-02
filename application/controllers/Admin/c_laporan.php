<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->library('pdf');
        $this->load->model('m_chatting');
    }
    public function produk()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN PRODUK WINDU SARI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(35, 6, '', 0, 0);
        $pdf->Cell(25, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(25, 6, 'ID PRODUK', 1, 0, 'C');
        $pdf->Cell(60, 6, 'NAMA PRODUK', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $produk = $this->m_laporan->produk();
        foreach ($produk as $row) {
            $pdf->Cell(35, 6, '', 0, 0);
            $pdf->Cell(25, 6, $no++, 1, 0, 'C');
            $pdf->Cell(25, 6, $row->id, 1, 0);
            $pdf->Cell(60, 6,  $row->nama_produk, 1, 1);
        }
        $pdf->Output();
    }
    public function kategori($id)
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN KATEGORI PRODUK WINDU SARI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $produk = $this->m_laporan->kategori($id);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(25, 10, '', 0, 1, 'C');
        $pdf->Cell(25, 6, 'Kode Produk : ', 0, 0, 'C');
        $pdf->Cell(25, 6, $produk['produk']->id, 0, 1, 'C');
        $pdf->Cell(25, 6, 'Nama Produk : ', 0, 0, 'C');
        $pdf->Cell(25, 6, $produk['produk']->nama_produk, 0, 1, 'C');


        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(30, 6, 'ID KATEGORI', 1, 0, 'C');
        $pdf->Cell(25, 6, 'BERAT', 1, 0, 'C');
        $pdf->Cell(25, 6, 'HARGA', 1, 0, 'C');
        $pdf->Cell(25, 6, 'QTY', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);

        $no = 1;
        $kategori = $this->m_laporan->kategori($id);
        foreach ($kategori['kategori'] as $row) {
            $pdf->Cell(25, 6, $no++, 1, 0, 'C');
            $pdf->Cell(30, 6, $row->id_kategori, 1, 0, 'C');
            $pdf->Cell(25, 6, $row->berat_produk . ' gram', 1, 0, 'C');
            $pdf->Cell(25, 6, 'Rp. ' . number_format($row->harga_produk), 1, 0, 'C');
            $pdf->Cell(25, 6, $row->qty_produk, 1, 1, 'C');
        }
        $pdf->Output();
    }
    public function user()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN AKUN USER WINDU SARI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, '', 0, 0);
        $pdf->Cell(25, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(25, 6, 'NAMA USER', 1, 0, 'C');
        $pdf->Cell(60, 6, 'USERNAME', 1, 0, 'C');
        $pdf->Cell(60, 6, 'PASSWORD', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $user = $this->m_laporan->user();
        foreach ($user as $row) {
            $pdf->Cell(10, 6, '', 0, 0);
            $pdf->Cell(25, 6, $no++, 1, 0, 'C');
            $pdf->Cell(25, 6, $row->nama_user, 1, 0, 'C');
            $pdf->Cell(60, 6, $row->username, 1, 0, 'C');
            $pdf->Cell(60, 6, $row->password, 1, 1, 'C');
        }
        $pdf->Output();
    }
    public function diskon()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN DISKON WINDU SARI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, '', 0, 0);
        $pdf->Cell(10, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(35, 6, 'NAMA PRODUK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'BERAT PRODUK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'HARGA PRODUK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'BESAR DISKON', 1, 0, 'C');
        $pdf->Cell(35, 6, 's/d TANGGAL', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $diskon = $this->m_laporan->diskon();
        foreach ($diskon as $row) {
            $pdf->Cell(10, 6, '', 0, 0);
            $pdf->Cell(10, 6, $no++, 1, 0, 'C');
            $pdf->Cell(35, 6, $row->nama_produk, 1, 0);
            $pdf->Cell(35, 6, $row->berat_produk . ' gram', 1, 0, 'C');
            $pdf->Cell(35, 6, 'Rp. ' . number_format($row->harga_produk,), 1, 0, 'C');
            $pdf->Cell(35, 6, $row->besar_diskon . ' %', 1, 0, 'C');
            $pdf->Cell(35, 6, $row->tgl_selesai, 1, 1, 'C');
        }
        $pdf->Output();
    }

    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/laporan/vlapharian', $data);
        $this->load->view('admin/footer');
    }

    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/laporan/vlapbulanan', $data);
        $this->load->view('admin/footer');
    }

    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/laporan/vlaptahunan', $data);
        $this->load->view('admin/footer');
    }
}
