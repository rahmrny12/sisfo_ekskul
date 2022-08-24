<?php

class M_ekskul extends CI_Model {
    public function getEkskul() {
        $this->db->from('ekskul');
        $this->db->join('guru_pembimbing', 'guru_pembimbing.id_guru_pembimbing=ekskul.id_guru_pembimbing', 'left');
        return $this->db->get();
    }

    public function searchEkskul($keyword) {
        $this->db->from('ekskul');
        $this->db->like('nama_ekskul', $keyword);
        $this->db->join('guru_pembimbing', 'guru_pembimbing.id_guru_pembimbing=ekskul.id_guru_pembimbing', 'left');
        return $this->db->get()->result_array();
    }

    public function getEkskulDetail($id_ekskul) {
        $ekskul = $this->db->get_where('ekskul', ['id_ekskul' => $id_ekskul])->row_array();
        $ekskul['guru_pembimbing'] = $this->db->get_where('guru_pembimbing', ['id_guru_pembimbing' => $ekskul['id_guru_pembimbing']])->row_array();
        return $ekskul;
    }

    public function alreadyRegisterToEkskul($id_ekskul) {
        return $this->db->get_where('pendaftaran', ['id_ekskul' => $id_ekskul, 'id_siswa' => $this->session->userdata('id_siswa')]);
    }

    public function getAnggotaEkskul($id_ekskul) {
        $this->db->from('siswa');
        $this->db->join('pendaftaran', 'pendaftaran.id_siswa=siswa.id_siswa');
        $this->db->where('id_ekskul', $id_ekskul);
        $this->db->where('dikonfirmasi', 1);
        return $this->db->get();
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

    public function confirmEkskul($id_ekskul, $id_siswa) {
        return $this->db->update('pendaftaran', ['dikonfirmasi' => 1], ['id_ekskul' => $id_ekskul, 'id_siswa' => $id_siswa]);
    }
    
    public function totalKuis() {
        return $this->db->get('ekskul')->num_rows();
    }
}