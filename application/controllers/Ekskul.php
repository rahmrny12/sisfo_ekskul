<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul extends CI_Controller
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

		$data['title'] = 'Daftar Ekstrakurikuler';
		$this->load->view('template-admin/header', $data);
		$this->load->view('ekskul/index', $data);
		$this->load->view('template-admin/footer');
	}

	public function detail($id_ekskul)
	{
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul)->row_array();

		$data['title'] = 'Detail Ekskul';
		$this->load->view('template-admin/header', $data);
		$this->load->view('ekskul/detail', $data);
		$this->load->view('template-admin/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_ekskul', 'Nama ekskul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		if (empty($_FILES['foto_ekskul']['name'])) {
			$this->form_validation->set_rules('foto_ekskul', 'Foto Ekskul', 'required');
		}

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ekstrakurikuler';
			$this->load->view('template-admin/header', $data);
			$this->load->view('ekskul/tambah', $data);
			$this->load->view('template-admin/footer');
		} else {
			$config['upload_path'] = './assets/images/ekskul_images/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['encrypt_name'] = true;
			$config['max_size'] = '2048';
			$config['max_width'] = '2048';
			$config['max_height'] = '2048';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto_ekskul')) {
				$foto_ekskul = $this->upload->data();

				$ekskul_baru = [
					'nama_ekskul' => $this->input->post('nama_ekskul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'foto_ekskul' => $foto_ekskul['file_name'],
				];

				$this->m_ekskul->insertEkskul($ekskul_baru);
				$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul baru berhasil ditambahkan.</div>');
				redirect('ekskul');
			} else {
				$upload_error = $this->upload->display_errors();
				$this->session->set_flashdata('upload_error', '<div class="alert alert-warning font-weight-bold">' . $upload_error .  '</div>');
				redirect('ekskul/tambah');
			}
		}
	}

	public function tambah_kegiatan()
	{
		$this->form_validation->set_rules('nama_ekskul', 'Nama ekskul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		if (empty($_FILES['foto_ekskul']['name'])) {
			$this->form_validation->set_rules('foto_ekskul', 'Foto Ekskul', 'required');
		}

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ekstrakurikuler';
			$this->load->view('template-admin/header', $data);
			$this->load->view('ekskul/tambah', $data);
			$this->load->view('template-admin/footer');
		} else {
			$config['upload_path'] = './assets/images/ekskul_images/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['encrypt_name'] = true;
			$config['max_size'] = '2048';
			$config['max_width'] = '2048';
			$config['max_height'] = '2048';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto_ekskul')) {
				$foto_ekskul = $this->upload->data();

				$ekskul_baru = [
					'nama_ekskul' => $this->input->post('nama_ekskul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'foto_ekskul' => $foto_ekskul['file_name'],
				];

				$this->m_ekskul->insertEkskul($ekskul_baru);
				$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul baru berhasil ditambahkan.</div>');
				redirect('ekskul');
			} else {
				$upload_error = $this->upload->display_errors();
				$this->session->set_flashdata('upload_error', '<div class="alert alert-warning font-weight-bold">' . $upload_error .  '</div>');
				redirect('ekskul/tambah');
			}
		}
	}

	public function edit($id_ekskul)
	{
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul)->row_array();

		$this->form_validation->set_rules('nama_ekskul', 'Nama ekskul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Ekstrakurikuler';
			$this->load->view('template-admin/header', $data);
			$this->load->view('ekskul/edit', $data);
			$this->load->view('template-admin/footer');
		} else {
			if (!empty($_FILES['foto_ekskul']['name'])) {
				$config['upload_path'] = './assets/images/ekskul_images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['encrypt_name'] = true;
				$config['max_size'] = '2048';
				$config['max_width'] = '1024';
				$config['max_height'] = '1024';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto_ekskul')) {
					$foto_lama = './assets/images/ekskul_images/' . $data['ekskul']['foto_ekskul'];
					if (file_exists($foto_lama)) {
						unlink($foto_lama);
					}

					$foto_ekskul = $this->upload->data();
					$ekskul_baru = [
						'nama_ekskul' => $this->input->post('nama_ekskul'),
						'deskripsi' => $this->input->post('deskripsi'),
						'foto_ekskul' => $foto_ekskul['file_name'],
					];

					$this->m_ekskul->updateEkskul($id_ekskul, $ekskul_baru);
					$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul baru diedit.</div>');
					redirect('ekskul');
				} else {
					$upload_error = $this->upload->display_errors();
					$this->session->set_flashdata('upload_error', '<div class="alert alert-warning font-weight-bold">' . $upload_error .  '</div>');
					redirect('ekskul/edit/' . $id_ekskul);
				}
			} else {
				$ekskul_baru = [
					'nama_ekskul' => $this->input->post('nama_ekskul'),
					'deskripsi' => $this->input->post('deskripsi'),
				];

				$this->m_ekskul->updateEkskul($id_ekskul, $ekskul_baru);
				$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul berhasil diedit.</div>');
				redirect('ekskul');
			}
		}
	}

	public function hapus($id_ekskul)
	{
		$this->m_ekskul->deleteEkskul($id_ekskul);
		$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Ekskul berhasil dihapus.</div>');
		redirect('ekskul');
	}
}
