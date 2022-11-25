<?php

class M_guru extends CI_Model
{
    public function getGuru()
    {
        $this->db->select('guru_pembimbing.id_guru_pembimbing, guru_pembimbing.nama_guru, guru_pembimbing.no_telp, ekskul.id_ekskul, ekskul.nama_ekskul');
        $this->db->from('guru_pembimbing');
        $this->db->join('ekskul', 'ekskul.id_guru_pembimbing=guru_pembimbing.id_guru_pembimbing', 'left');
        $this->db->group_by('guru_pembimbing.nama_guru');
        return $this->db->get();
    }

    public function login($username)
    {
        return $this->db->get_where('admin', ['username' => $username]);
    }

    public function insertGuru($data)
    {
        return $this->db->insert('guru_pembimbing', $data);
    }

    public function getDetailGuru($id_guru)
    {
        return $this->db->get_where('guru_pembimbing', ['id_guru_pembimbing' => $id_guru]);
    }
    public function updateGuru($id_guru, $data)
    {
        return $this->db->update('guru_pembimbing', $data, ['id_guru_pembimbing' => $id_guru]);
    }

    public function insertGuruToEkskul($id_ekskul, $id_guru)
    {
        return $this->db->update('ekskul', ['id_guru_pembimbing' => $id_guru], ['id_ekskul' => $id_ekskul]);
    }

    public function deleteGuruFromEkskul($id_ekskul)
    {
        return $this->db->update('ekskul', ['id_guru_pembimbing' => null], ['id_ekskul' => $id_ekskul]);
    }

    public function totalGuru() {
        return $this->db->get('guru_pembimbing')->num_rows();
    }
}
