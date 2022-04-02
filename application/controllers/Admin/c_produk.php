<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_chatting');
        $this->load->helper(array('form', 'url'));
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data Produk',
            'produk' => $this->m_produk->select_all_data(),
            'jml_produk' => $this->m_produk->jml_produk(),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vtampil_produk', $data);
        $this->load->view('admin/vtambah_produk', $data);
        $this->load->view('admin/footer');
    }

    // Add a new item
    public function insert()
    {
        $config['upload_path']          = './asset/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = '5000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array(
                'title' => 'Data Produk',
                'error' => $this->upload->display_errors(),
                'produk' => $this->m_produk->select_all_data(),
                'tampil_chat' => $this->m_chatting->select_chatting()
            );

            $this->load->view('admin/header', $error);
            $this->load->view('admin/navbar', $error);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/vtampil_produk', $error);
            $this->load->view('admin/vtambah_produk', $error);
            $this->load->view('admin/footer');
        } else {
            $upload_data =  $this->upload->data();
            $data = array(
                'id' => $this->input->post('id'),
                'nama_produk' => $this->input->post('nama_produk'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $upload_data['file_name']
            );
            $this->m_produk->insert_produk($data);

            $rating = array(
                'id' => $this->input->post('id'),
                'nilai_rating' => '0'
            );
            $this->db->insert('rating', $rating);

            $isi = array(
                'id_kategori' => $this->input->post('id_kategori'),
                'id' => $this->input->post('id'),
                'berat_produk' => '250',
                'harga_produk' => $this->input->post('harga'),
                'qty_produk' => $this->input->post('qty')
            );
            $this->m_produk->insert_kategori($isi);

            for ($i = 1; $i <= 3; $i++) {
                $diskon = array(
                    'id_kategori' => $this->input->post('id_kategori'),
                    'id_produk' => $this->input->post('id'),
                    'nama_diskon' => '0',
                    'besar_diskon' => '0',
                    'level_member' => $i,
                    'tgl_selesai' => '0'
                );
                $this->m_produk->insert_diskon($diskon);
            }


            $this->session->set_flashdata('pesan', 'Data Berhasil di Simpan!!!');
            redirect('Admin/c_produk');
        }
    }
    public function insert_kategori()
    {
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'id' => $this->input->post('id'),
            'berat_produk' => $this->input->post('berat'),
            'harga_produk' => $this->input->post('harga'),
            'qty_produk' => $this->input->post('jml')
        );
        $this->m_produk->insert_kategori($data);

        for ($i = 1; $i <= 3; $i++) {
            $diskon = array(
                'id_kategori' => $this->input->post('id_kategori'),
                'id_produk' => $this->input->post('id'),
                'nama_diskon' => '0',
                'besar_diskon' => '0',
                'level_member' => $i,
                'tgl_selesai' => '0'
            );
            $this->m_produk->insert_diskon($diskon);
        }
        $this->session->set_flashdata('pesan', 'Data Kategori Sudah Ditambahkan!!!');
        redirect('Admin/c_produk/select_kategori/' . $data['id']);
    }
    public function select_kategori($id)
    {
        $data = array(
            'title' => 'Data Produk',
            'kategori' => $this->m_produk->kategori($id),
            'jml_kategori' => $this->m_produk->jml_kategori($id),
            'tampil_chat' => $this->m_chatting->select_chatting()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkategori_produk', $data);
        $this->load->view('admin/footer');
    }


    //Delete one item
    public function delete($id)
    {
        $data = array(
            'produk' => $this->m_produk->delete($id)
        );
        $this->db->where('id', $id);
        $this->db->delete('kategori');

        $this->db->where('id_produk', $id);
        $this->db->delete('diskon');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!!!');
        redirect('Admin/c_produk');
    }

    //update data 
    public function edit($id)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Data Produk',
                    'produk' => $this->m_produk->select_all_data(),
                    'tampil_chat' => $this->m_chatting->select_chatting()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/navbar', $data);
                $this->load->view('admin/sidebar');
                $this->load->view('admin/vtampil_produk', $data);
                $this->load->view('admin/vtambah_produk', $data);
                $this->load->view('admin/footer');
            } else {
                $produk = $this->m_produk->select_all_data();
                if ($produk->gambar !== "") {
                    unlink('./asset/gambar/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name']
                );
                $this->db->where('id', $id);
                $this->db->update('produk', $data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui !!!');
                redirect('Admin/c_produk');
            } //tanpa ganti gambar
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->db->where('id', $id);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui !!!');
            redirect('Admin/c_produk');
        }
        redirect('Admin/c_produk');
    }
    public function hapus_kategori($id_kategori)
    {
        $id = $this->input->post('id');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('admin/c_produk/select_kategori/' . $id);
    }
    public function edit_kategori($id_kategori)
    {
        $id = $this->input->post('id');
        $data = array(
            'id' => $id,
            'berat_produk' => $this->input->post('berat'),
            'harga_produk' => $this->input->post('harga'),
            'qty_produk' => $this->input->post('jml')
        );
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui!!!');
        redirect('admin/c_produk/select_kategori/' . $id);
    }
}

/* End of file c_produk.php */
