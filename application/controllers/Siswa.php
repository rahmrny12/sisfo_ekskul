<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');
		$this->load->model('m_ekskul');
	}

	public function index()
	{
		$data['siswa'] = $this->m_siswa->getSiswa();

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

	public function cari($nisn)
	{
		$siswa = $this->m_siswa->getSiswaByNISN($nisn)->row();
		echo json_encode($siswa);
	}

	public function daftar_ekskul()
	{
		$this->form_validation->set_rules('id_siswa', 'Siswa', 'trim|required');
		$this->form_validation->set_rules('ekskul', 'Ekstrakurikuler', 'trim|required');

		$data['ekskul'] = $this->m_ekskul->get_ekskul()->result_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ekstrakurikuler';
			$this->load->view('template/header', $data);
			$this->load->view('siswa/daftar-ekskul', $data);
			$this->load->view('template/footer');
		} else {
			$daftar = [
				'id_siswa' => $this->input->post('id_siswa'),
				'id_ekskul' => $this->input->post('ekskul'),
				'waktu_pendaftaran' => time(),
			];

			$this->db->db_debug = FALSE;
			$result = $this->m_siswa->insert_pendaftaran($daftar);
			if (!$result) {
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Siswa sudah terdaftar. Kode error[' . $error['code'] . ']</div>');
				redirect('siswa/daftar_ekskul');
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Pendaftaran berhasil.</div>');
			redirect('siswa/daftar_ekskul');
		}
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ekstrakurikuler';
			$this->load->view('template/header', $data);
			$this->load->view('siswa/tambah', $data);
			$this->load->view('template/footer');
		} else {
			$siswa = [
				'nama_siswa' => $this->input->post('nama_siswa'),
				'nisn' => $this->input->post('nisn'),
				'kelas' => $this->input->post('kelas'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
			];

			$this->m_siswa->insert_siswa($siswa);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Siswa baru berhasil ditambahkan.</div>');
			redirect('siswa');
		}
	}

	// public function edit($id_ekskul)
	// {
	// 	$data['ekskul'] = $this->m_ekskul->get_ekskul_detail($id_ekskul)->row_array();

	// 	$this->form_validation->set_rules('nama_ekskul', 'Nama ekskul', 'trim|required');
	// 	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

	// 	if ($this->form_validation->run() == false) {
	// 		$data['title'] = 'Edit Ekstrakurikuler';
	// 		$this->load->view('template/header', $data);
	// 		$this->load->view('siswa/edit', $data);
	// 		$this->load->view('template/footer');
	// 	} else {
	// 		if (!empty($_FILES['foto_ekskul']['name'])) {
	// 			$config['upload_path'] = './assets/images/ekskul_images/';
	// 			$config['allowed_types'] = 'jpg|jpeg|png';
	// 			$config['encrypt_name'] = true;
	// 			$config['max_size'] = '2048';
	// 			$config['max_width'] = '1024';
	// 			$config['max_height'] = '1024';

	// 			$this->load->library('upload', $config);

	// 			if ($this->upload->do_upload('foto_ekskul')) {
	// 				$foto_lama = './assets/images/ekskul_images/' . $data['ekskul']['foto_ekskul'];
	// 				if (file_exists($foto_lama)) {
	// 					unlink($foto_lama);
	// 				}

	// 				$foto_ekskul = $this->upload->data();
	// 				$ekskul_baru = [
	// 					'nama_ekskul' => $this->input->post('nama_ekskul'),
	// 					'deskripsi' => $this->input->post('deskripsi'),
	// 					'foto_ekskul' => $foto_ekskul['file_name'],
	// 				];

	// 				$this->m_ekskul->update_ekskul($id_ekskul, $ekskul_baru);
	// 				$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul baru diedit.</div>');
	// 				redirect('ekskul');
	// 			} else {
	// 				$upload_error = $this->upload->display_errors();
	// 				$this->session->set_flashdata('upload_error', '<div class="alert alert-warning font-weight-bold">' . $upload_error .  '</div>');
	// 				redirect('siswa/edit/' . $id_ekskul);
	// 			}
	// 		} else {
	// 			$ekskul_baru = [
	// 				'nama_ekskul' => $this->input->post('nama_ekskul'),
	// 				'deskripsi' => $this->input->post('deskripsi'),
	// 			];

	// 			$this->m_ekskul->update_ekskul($id_ekskul, $ekskul_baru);
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul berhasil diedit.</div>');
	// 			redirect('ekskul');
	// 		}
	// 	}
	// }

	// public function hapus($id_ekskul)
	// {
	// 	$this->m_ekskul->delete_ekskul($id_ekskul);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Ekskul berhasil dihapus.</div>');
	// 	redirect('ekskul');
	// }
}
