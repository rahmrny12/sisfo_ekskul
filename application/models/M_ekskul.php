<?php

class M_ekskul extends CI_Model {
    public function get_ekskul() {
        return $this->db->get('ekskul');
    }
}