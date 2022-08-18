<?php

class M_siswa extends CI_Model
{
    public function getSiswa()
    {
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
        $siswa = $this->db->get_where('siswa', ['username' => $username]);
        if ($siswa != null) {
            return $siswa;
        } else {
            return $this->db->get_where('siswa', ['nisn' => $username]);
        }
    }

    public function filterSiswa($keyword, $filter_siswa, $filter_ekskul)
    {
        $this->db->like('nama_siswa', $keyword);
        if ($filter_siswa == 'baru_daftar') {
            $this->db->order_by('id_siswa', 'DESC');
        }
        $siswa = $this->db->get('siswa')->result_array();

        $index = 0;
        foreach ($siswa as $data) {
            $siswa[$index]['ekskul'] = $this->m_siswa->getEkskulSiswa($data['id_siswa'])->result_array();
            $index++;
        }

        if ($filter_siswa == 'belum_mengikuti') {
            $siswa = array_filter($siswa, static function ($data) {
                return $data['ekskul'] == null;
            });
        } else if ($filter_ekskul != "") {
            $siswa = array_filter($siswa, static function ($data) use ($filter_ekskul) {
                foreach ($data['ekskul'] as $ekskul) {
                    return $ekskul['id_ekskul'] == $filter_ekskul;
                }
            });
        }

        return $siswa;
    }

    public function getSiswaByNISN($nisn)
    {
        return $this->db->get_where('siswa', ['nisn' => $nisn]);
    }

    public function getDetailSiswa($id_siswa)
    {
        return $this->db->get('siswa');
    }

    public function getEkskulSiswa($id_siswa)
    {
        $this->db->select('*');
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
}
