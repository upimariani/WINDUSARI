<?php
class m_user extends CI_Model
{
    public function select_all_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function insert_user()
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user')
        );
        $this->db->insert('user', $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Simpan!!!');
    }
    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        $this->session->set_flashdata('delete', 'Data Berhasil di Hapus!!!');
    }

    public function update($id_user)
    {
        $data = array(
            'id_user' => $id_user,
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user')
        );
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }
}
