<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_ekskul');
		$this->load->model('m_siswa');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Ekskul';
			$this->load->view('landing/login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$siswa = $this->m_siswa->login($username)->row_array();
			if ($siswa != null) {
				if (password_verify($password, $siswa['password'])) {
					$siswa = [
						'nama_siswa' => $siswa['nama_siswa'],
						'username' => $siswa['username'],
						'nisn' => $siswa['nisn'],
						'kelas' => $siswa['kelas'],
						'alamat' => $siswa['alamat'],
						'no_telp' => $siswa['no_telp'],
					];

					$this->session->userdata($siswa);
					$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold my-3">Selamat datang, ' . $siswa['nama_siswa'] . '.</div>');
					redirect('home/dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger font-weight-bold mb-0">Password yang Anda masukkan salah.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold mb-0">Siswa tidak ditemukan.</div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi Siswa';
			$this->load->view('landing/registration', $data);
		} else {
			$siswa = [
				'nama_siswa' => $this->input->post('nama_siswa'),
				'nisn' => $this->input->post('nisn'),
				'kelas' => $this->input->post('kelas'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];

			$this->m_siswa->insertSiswa($siswa);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Selamat, Anda berhasil registrasi. Silahkan login untuk melanjutkan.</div>');
			redirect('auth');
		}
	}
}
