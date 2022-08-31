<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_ekskul');
		$this->load->model('m_siswa');
	}

	public function index()
	{
		$data['ekskul'] = $this->m_ekskul->getEkskul()->result_array();

		$data['title'] = 'Sisfo Ekskul';
		$this->load->view('template-landing/header', $data);
		$this->load->view('template-landing/navbar', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('template-landing/footer');
	}

	public function detail_ekskul($id_ekskul)
	{
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul);
		$data['anggota'] = $this->m_ekskul->getAnggotaEkskul($id_ekskul)->result_array();
		$data['jadwal'] = $this->m_ekskul->getJadwal($id_ekskul)->result_array();

		$data['sudah_daftar'] = $this->m_ekskul->alreadyRegisterToEkskul($id_ekskul)->row_array();
		$data['title'] = 'Detail Ekskul';
		$this->load->view('template-landing/header', $data);
		$this->load->view('template-landing/navbar', $data);
		$this->load->view('landing/detail-ekskul', $data);
		$this->load->view('template-landing/footer');
	}

	public function daftar_ekskul($id_ekskul)
	{
		$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('ekskul', 'Ekstrakurikuler', 'trim|required');

		$data['default_ekskul'] = $id_ekskul;
		$data['ekskul'] = $this->m_ekskul->getEkskul()->result_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar Ekstrakurikuler';
			$this->load->view('template-landing/header', $data);
			$this->load->view('template-landing/navbar', $data);
			$this->load->view('landing/daftar-ekskul', $data);
			$this->load->view('template-landing/footer');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$daftar = [
				'id_siswa' => $this->session->userdata('id_siswa'),
				'id_ekskul' => $this->input->post('ekskul'),
				'alasan_bergabung' => $this->input->post('alasan'),
				'waktu_pendaftaran' => date("Y-m-d H:i:s"),
			];

			$result = $this->m_siswa->insertPendaftaran($daftar);
			if (!$result) {
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Siswa sudah terdaftar. Kode error[' . $error['code'] . ']</div>');
				redirect('landing/detail_ekskul/' . $id_ekskul);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Pendaftaran berhasil.</div>');
			redirect('landing/detail_ekskul/' . $id_ekskul);
		}
	}

	public function edit_profil($id_siswa)
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Profil Siswa';
			$data['siswa'] = $this->m_siswa->getDetailSiswa($id_siswa)->row_array();

			$this->load->view('template-landing/header', $data);
			$this->load->view('template-landing/navbar', $data);
			$this->load->view('landing/profil', $data);
			$this->load->view('template-landing/footer');
		} else {
			$data = [
				'nama_siswa' => $this->input->post('nama_siswa'),
				'nisn' => $this->input->post('nisn'),
				'kelas' => $this->input->post('kelas'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
			];

			$result = $this->m_siswa->editProfil($id_siswa, $data);

			if ($result) {
				$this->session->set_userdata($data);
				$this->session->set_userdata('role', 'siswa');
			}

			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Profil Anda berhasil diedit.</div>');
			redirect('landing/edit_profil/' . $id_siswa);
		}
	}
}
