<?php

class M_siswa extends CI_Model
{
    public function getSiswa()
    {
        $this->db->order_by('id_siswa', 'DESC');
        $siswa = $this->db->get('siswa')->result_array();

        $index = 0;
        foreach ($siswa as $data) {
            $siswa[$index]['ekskul'] = $this->m_siswa->getEkskulSiswa($data['id_siswa'])->result_array();
            $index++;
        }

        return $siswa;
    }

    public function login($username)
    {
        $siswa = $this->db->get_where('siswa', ['username' => $username])->row_array();
        if ($siswa != null) {
            return $siswa;
        } else {
            return $this->db->get_where('siswa', ['nisn' => $username])->row_array();
        }
    }

    public function filterSiswa($keyword, $filter_ekskul)
    {
        $this->db->from('siswa');
        $this->db->join('pendaftaran', 'pendaftaran.id_siswa=siswa.id_siswa', 'left');
        $this->db->like('nama_siswa', $keyword);
        $this->db->group_by('siswa.id_siswa');

        if ($filter_ekskul != "") {
            $this->db->where('id_ekskul', $filter_ekskul);
        }

        $siswa = $this->db->get()->result_array();

        $index = 0;
        foreach ($siswa as $data) {
            $siswa[$index]['ekskul'] = $this->m_siswa->getEkskulSiswa($data['id_siswa'])->result_array();
            $index++;
        }

        return $siswa;
    }

    public function getDetailSiswa($id_siswa)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id_siswa]);
    }

    public function getEkskulSiswa($id_siswa)
    {
        $this->db->from('pendaftaran');
        $this->db->join('ekskul', 'ekskul.id_ekskul=pendaftaran.id_ekskul');
        $this->db->where(['pendaftaran.id_siswa' => $id_siswa]);
        $this->db->order_by('pendaftaran.waktu_pendaftaran', "DESC");
        return $this->db->get();
    }

    public function insertSiswa($data)
    {
        return $this->db->insert('siswa', $data);
    }

    public function insertPendaftaran($data)
    {
        return $this->db->insert('pendaftaran', $data);
    }

    public function removeSiswaFromEkskul($id_ekskul, $id_siswa)
    {
        return $this->db->delete('pendaftaran', ['id_ekskul' => $id_ekskul, 'id_siswa' => $id_siswa]);
    }

    public function totalSiswa()
    {
        return $this->db->get('siswa')->num_rows();
    }

    public function editProfil($id_siswa, $data)
    {
        return $this->db->update('siswa', $data, ['id_siswa' => $id_siswa]);
    }
}
