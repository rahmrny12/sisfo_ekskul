<?php

class M_ekskul extends CI_Model {
    public function getEkskul() {
        return $this->db->get('ekskul');
    }

    public function getEkskulDetail($id_ekskul) {
        return $this->db->get_where('ekskul', ['id_ekskul' => $id_ekskul]);
    }

    public function alreadyRegisterToEkskul($id_ekskul) {
        $daftar = $this->db->get_where('pendaftaran', ['id_ekskul' => $id_ekskul, 'id_siswa' => $this->session->userdata('id_siswa')]);
        return $daftar->num_rows() > 0 ? true : false;
    }

    public function insertEkskul($data) {
        return $this->db->insert('ekskul', $data);
    }

    public function deleteEkskul($id_ekskul) {
        return $this->db->delete('ekskul', ['id_ekskul' => $id_ekskul]);
    }

    public function updateEkskul($id_ekskul, $data) {
        return $this->db->update('ekskul', $data, ['id_ekskul' => $id_ekskul]);
    }

    public function totalKuis() {
        return $this->db->get('ekskul')->num_rows();
    }
}