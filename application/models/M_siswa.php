<?php

class M_siswa extends CI_Model {
    public function get_siswa() {
        return $this->db->get('siswa');
    }

    public function get_detail_siswa($id_siswa) {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('siswa', 'siswa.id_siswa=pendaftaran.id_siswa');
        $this->db->where(['pendaftaran.id_siswa' => $id_siswa]);
        $this->db->order_by('waktu_pendaftaran',"DESC");
        return $this->db->get();
    }

    public function get_ekskul_siswa($id_siswa) {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('ekskul', 'ekskul.id_ekskul=pendaftaran.id_ekskul');
        $this->db->where(['pendaftaran.id_siswa' => $id_siswa]);
        $this->db->order_by('pendaftaran.waktu_pendaftaran',"DESC");
        return $this->db->get();
    }
}