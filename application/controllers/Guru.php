<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_admin_login();
		$this->load->model('m_guru');
		$this->load->model('m_ekskul');
	}

	public function index()
	{
		$data['guru'] = $this->m_guru->getGuru()->result_array();

		$data['title'] = 'Daftar Guru';
		$this->load->view('template-admin/header', $data);
		$this->load->view('guru/index', $data);
		$this->load->view('template-admin/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Guru Baru';
			$this->load->view('template-admin/header', $data);
			$this->load->view('guru/tambah', $data);
			$this->load->view('template-admin/footer');
		} else {
			$guru = [
				'nama_guru' => $this->input->post('nama_guru'),
				'no_telp' => $this->input->post('no_telp'),
			];

			$this->m_guru->insertGuru($guru);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Guru baru berhasil ditambahkan.</div>');
			redirect('guru');
		}
	}

	public function edit($id_guru)
	{
		$data['guru'] = $this->m_guru->getDetailGuru($id_guru)->row_array();

		$this->form_validation->set_rules('nama_guru', 'nama_guru', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Guru';
			$this->load->view('template-admin/header', $data);
			$this->load->view('guru/edit', $data);
			$this->load->view('template-admin/footer');
		} else {
			$data = [
				'nama_guru' => $this->input->post('nama_guru'),
				'no_telp' => $this->input->post('no_telp'),
			];

			$this->m_guru->updateGuru($id_guru, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Guru berhasil diedit.</div>');
			redirect('guru');
		}
	}
}
