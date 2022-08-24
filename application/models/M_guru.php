<?php

class M_guru extends CI_Model
{
    public function getGuru()
    {
        $this->db->select('guru_pembimbing.id_guru_pembimbing, guru_pembimbing.nama_guru, guru_pembimbing.no_telp, ekskul.nama_ekskul');
        $this->db->from('guru_pembimbing');
        $this->db->join('ekskul', 'ekskul.id_guru_pembimbing=guru_pembimbing.id_guru_pembimbing', 'left');
        $this->db->group_by('guru_pembimbing.nama_guru');
        $guru = $this->db->get();
        
        return $guru;
    }

    public function login($username)
    {
        return $this->db->get_where('admin', ['username' => $username]);
    }

    public function insertGuru($data)
    {
        return $this->db->insert('guru_pembimbing', $data);
    }

    public function getGuruFromEkskul($id_ekskul)
    {
        $guru = $this->db->get('guru_pembimbing')->result_array();
        
        $index = 0;
        foreach ($guru as $data) {
            $guru[$index]['ekskul'] = $this->db->get_where('ekskul', ['id_guru_pembimbing', $data['id_guru_pembimbing']])->row_array();
            $index++;
        }

        return $guru;
    }

    public function deleteGuruFromEkskul($id_ekskul) {
        return $this->db->update('ekskul', ['id_guru_pembimbing' => null], ['id_ekskul' => $id_ekskul]);
    }

    public function insertGuruToEkskul($id_ekskul, $id_guru) {
        return $this->db->update('ekskul', ['id_guru_pembimbing' => $id_guru], ['id_ekskul' => $id_ekskul]);
    }
}
