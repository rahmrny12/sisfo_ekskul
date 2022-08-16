<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');
	}
    
    public function index()
    {
        $data['siswa'] = $this->m_siswa->get_siswa()->result_array();

		$data['title'] = 'Daftar Siswa';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('template/footer');
    }

    public function detail($id_siswa)
    {
        $data['siswa'] = $this->m_siswa->get_detail_siswa($id_siswa)->row_array();
        $data['ekskul'] = $this->m_siswa->get_ekskul_siswa($id_siswa)->result_array();

		$data['title'] = 'Detail Siswa';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/detail', $data);
		$this->load->view('template/footer');
    }
}
