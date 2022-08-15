<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_ekskul');
	}
	
	public function index()
	{
		$data['ekskul'] = $this->m_ekskul->get_ekskul()->result_array();

		$data['title'] = 'Daftar Ekstrakurikuler';
		$this->load->view('template/header', $data);
		$this->load->view('ekskul/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_ekskul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'trim|required');
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ekstrakurikuler';
			$this->load->view('template/header', $data);
			$this->load->view('ekskul/tambah', $data);
			$this->load->view('template/footer');
		} else {
			$ekskul_baru = [
				'nama_ekskul' => $this->input->post('nama_ekskul'),
				'deskripsi' => $this->input->post('deskripsi'),
			];
		}
	}
	
	public function hapus()
	{
		echo "hello";
	}
	
}
