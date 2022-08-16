<?php

class M_ekskul extends CI_Model {
    public function get_ekskul() {
        return $this->db->get('ekskul');
    }

    public function get_ekskul_detail($id_ekskul) {
        return $this->db->get_where('ekskul', ['id_ekskul' => $id_ekskul]);
    }

    public function insert_ekskul($data) {
        return $this->db->insert('ekskul', $data);
    }

    public function delete_ekskul($id_ekskul) {
        return $this->db->delete('ekskul', ['id_ekskul' => $id_ekskul]);
    }

    public function update_ekskul($id_ekskul, $data) {
        return $this->db->update('ekskul', $data, ['id_ekskul' => $id_ekskul]);
    }
}