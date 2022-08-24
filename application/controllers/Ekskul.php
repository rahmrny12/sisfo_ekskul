<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_admin_login();
		$this->load->model('m_ekskul');
		$this->load->model('m_guru');
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
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul);
		$data['guru'] = $this->m_guru->getGuru()->result_array();

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

	public function cari_ekskul()
	{
		$keyword = $this->input->post('keyword');
		$ekskul = $this->m_ekskul->searchEkskul($keyword);

		$output = "";
		if ($ekskul != null) {
			foreach ($ekskul as $data) {
				$output .= '
				<tr>
					<td>
						<h6>' . ucwords($data['nama_ekskul']) . '</h6>
					</td>
					<td>
						<h6>' . ucfirst($data['deskripsi']) . '</h6>
					</td>
					<td>
						<img class="w-50" src="' . base_url('assets/images/ekskul_images/') . $data['foto_ekskul'] . '" alt="' .  $data['foto_ekskul'] . '">
					</td>
					<td class="col-2">';

				if ($data['nama_guru'] != null) {
					$output .= '<h6>' . ucwords($data['nama_guru']) . '</h6>';
				} else {
					$output .= '<h6 class="text-secondary">Belum Ada Guru Pembimbing</h6>';
				}

				$output .= '</td><td>
						<a class="btn btn-warning" href="' . base_url('ekskul/detail/') . $data['id_ekskul'] . '">
							Detail
						</a>
					</td>
				</tr>
				';
			}
		} else {
			$output = '<tr><td colspan="5" class="text-center pt-4"><h6>Data ekskul tidak ditemukan.</h6></td></tr>';
		}

		echo $output;
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
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul);

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
					redirect('ekskul/detail/' . $id_ekskul);
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
				redirect('ekskul/detail/' . $id_ekskul);
			}
		}
	}

	public function tambah_pembimbing($id_ekskul)
	{
		$this->form_validation->set_rules('guru', 'Guru', 'required');

		if ($this->form_validation->run() == false) {
			redirect('ekskul/detail/' . $id_ekskul);
		} else {
			$id_guru = $this->input->post('guru');
			$this->m_guru->insertGuruToEkskul($id_ekskul, $id_guru);
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Guru baru berhasil ditambahkan.</div>');
			redirect('ekskul/detail/' . $id_ekskul);
		}
	}

	public function edit_pembimbing($id_ekskul)
	{
		$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul);

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
					redirect('ekskul/detail/' . $id_ekskul);
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
				redirect('ekskul/detail/' . $id_ekskul);
			}
		}
	}

	public function hapus_pembimbing($id_ekskul)
	{
		$this->m_guru->deleteGuruFromEkskul($id_ekskul);
		$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Guru pembimbing berhasil dihapus dari ekskul berikut.</div>');
		redirect('ekskul/detail/' . $id_ekskul);
	}

	public function keluarkan_siswa()
	{
		$id_ekskul = $this->input->get('id_ekskul');
		$id_siswa = $this->input->get('id_siswa');
		$this->m_siswa->removeSiswaFromEkskul($id_ekskul, $id_siswa);
		redirect('siswa/detail/' . $id_siswa);
	}

	public function required_option($option)
	{
		if ($option == '') {
			$this->form_validation->set_message('required_option', 'Pilih guru pembimbing terlebih dahulu');
			return false;
		} else {
			return true;
		}
	}
}
