<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul)->row_array();
		
		$data['sudah_daftar'] = $this->m_ekskul->alreadyRegisterToEkskul($id_ekskul);
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
			$this->load->view('landing/daftar-ekskul', $data);
			$this->load->view('template-landing/footer');
		} else {
			$daftar = [
				'id_siswa' => $this->session->userdata('id_siswa'),
				'id_ekskul' => $this->input->post('ekskul'),
				'alasan_bergabung' => $this->input->post('alasan'),
				'waktu_pendaftaran' => date("Y-m-d H:i:s"),
			];

			// $this->db->db_debug = FALSE;
			$result = $this->m_siswa->insertPendaftaran($daftar);
			if (!$result) {
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Siswa sudah terdaftar. Kode error[' . $error['code'] . ']</div>');
				redirect('siswa/detail_ekskul/' . $id_ekskul);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Pendaftaran berhasil.</div>');
			redirect('siswa/detail_ekskul/' . $id_ekskul);
		}
	}
}
