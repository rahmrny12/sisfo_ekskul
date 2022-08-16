<?php

class M_siswa extends CI_Model {
    public function getSiswa() {
        $siswa = $this->db->get('siswa')->result_array();

        $index = 0;
        foreach ($siswa as $data) {
            $siswa[$index]['ekskul'] = $this->m_siswa->get_ekskul_siswa($data['id_siswa'])->result_array();
            $index++;
        }

        return $siswa;
    }

    public function getSiswaByNISN($nisn) {
        return $this->db->get_where('siswa', ['nisn' => $nisn]);
    }

    public function get_detail_siswa($id_siswa) {
        return $this->db->get('siswa');
    }

    public function get_ekskul_siswa($id_siswa) {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('ekskul', 'ekskul.id_ekskul=pendaftaran.id_ekskul');
        $this->db->where(['pendaftaran.id_siswa' => $id_siswa]);
        $this->db->order_by('pendaftaran.waktu_pendaftaran',"DESC");
        return $this->db->get();
    }

    public function insert_siswa($data) {
        return $this->db->insert('siswa', $data);
    }
    
    public function insert_pendaftaran($data) {
        return $this->db->insert('pendaftaran', $data);
    }
}