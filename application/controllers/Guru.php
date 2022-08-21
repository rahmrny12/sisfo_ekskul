<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
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
		$data['ekskul'] = $this->m_ekskul->getEkskul()->result_array();

		$data['title'] = 'Daftar Siswa';
		$this->load->view('template-admin/header', $data);
		$this->load->view('guru/index', $data);
		$this->load->view('template-admin/footer');
	}

	public function dashboard()
	{
		$data['total_kuis'] = $this->m_ekskul->totalKuis();
		
		$data['title'] = 'Dashboard';
		$this->load->view('template-admin/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template-admin/footer');
	}

	public function detail_siswa($id_siswa)
	{
		$data['siswa'] = $this->m_siswa->getDetailSiswa($id_siswa)->row_array();
		$data['ekskul'] = $this->m_siswa->getEkskulSiswa($id_siswa)->result_array();

		$data['title'] = 'Detail Siswa';
		$this->load->view('template-admin/header', $data);
		$this->load->view('guru/detail', $data);
		$this->load->view('template-admin/footer');
	}

	public function filter_siswa()
	{
		$keyword = $this->input->post('keyword');
		$filter_siswa = $this->input->post('filter_siswa');
		$filter_ekskul = $this->input->post('filter_ekskul');
		$siswa = $this->m_siswa->filterSiswa($keyword, $filter_siswa, $filter_ekskul);

		$output = "";
		if ($siswa != null) {
			foreach ($siswa as $data) {
				$output .= '
				<tr>
					<td>
						<h6>' . ucwords($data['nama_siswa']) . '</h6>
					</td>
					<td>
						<h6>' . $data['nisn'] . '</h6>
					</td>
					<td>
						<h6>' . strtoupper($data['kelas']) . '</h6>
					</td>
					<td>
						<h6>';

				if ($data['ekskul'] == null) {
					$output .= 'Belum ada ekskul diikuti.';
				} else {
					foreach ($data['ekskul'] as $ekskul) {
						$output .= '<span class="badge badge-pill badge-secondary py-3 px-4 mr-1">' . ucwords($ekskul['nama_ekskul']) . '</span>';
					}
				}

				$output .= '</h6>
						</td>
						<td>
							<a class="btn btn-secondary" href="' . base_url('guru/detail/') . $data['id_siswa'] . '">
								Detail Siswa
							</a>
						</td>
					</tr>
					';
			}
		} else {
			$output = '<tr><td colspan="5" class="text-center pt-4"><h6>Data siswa tidak ditemukan.</h6></td></tr>';
		}

		echo $output;
	}

	public function cari_siswa()
	{
		$nisn = $this->input->post('nisn');
		$siswa = $this->m_siswa->getSiswaByNISN($nisn)->row();
		echo json_encode($siswa);
	}

	public function daftar_ekskul_siswa()
	{
		$this->form_validation->set_rules('id_siswa', 'Siswa', 'trim|required');
		$this->form_validation->set_rules('nama_siswa', '-', 'trim|required');
		$this->form_validation->set_rules('kelas', '-', 'trim|required');
		$this->form_validation->set_rules('alamat', '-', 'trim|required');
		$this->form_validation->set_rules('no_telp', '-', 'trim|required');
		$this->form_validation->set_rules('ekskul', 'Ekstrakurikuler', 'trim|required');

		$data['ekskul'] = $this->m_ekskul->getEkskul()->result_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ekstrakurikuler';
			$this->load->view('template-admin/header', $data);
			$this->load->view('guru/daftar-ekskul', $data);
			$this->load->view('template-admin/footer');
		} else {
			$daftar = [
				'id_siswa' => $this->input->post('id_siswa'),
				'id_ekskul' => $this->input->post('ekskul'),
				'waktu_pendaftaran' => date("Y-m-d H:i:s"),
			];

			// $this->db->db_debug = FALSE;
			$result = $this->m_siswa->insertPendaftaran($daftar);
			if (!$result) {
				$error = $this->db->error();
				$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Siswa sudah terdaftar. Kode error[' . $error['code'] . ']</div>');
				redirect('guru/daftar-ekskul');
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Pendaftaran berhasil.</div>');
			redirect('guru/daftar-ekskul');
		}
	}

	public function tambah_siswa()
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
			$this->load->view('template-admin/header', $data);
			$this->load->view('guru/tambah', $data);
			$this->load->view('template-admin/footer');
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
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Siswa baru berhasil ditambahkan.</div>');
			redirect('siswa');
		}
	}

	// public function edit($id_ekskul)
	// {
	// 	$data['ekskul'] = $this->m_ekskul->getEkskulDetail($id_ekskul)->row_array();

	// 	$this->form_validation->set_rules('nama_ekskul', 'Nama ekskul', 'trim|required');
	// 	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

	// 	if ($this->form_validation->run() == false) {
	// 		$data['title'] = 'Edit Ekstrakurikuler';
	// 		$this->load->view('template-admin/header', $data);
	// 		$this->load->view('guru/edit', $data);
	// 		$this->load->view('template-admin/footer');
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

	// 				$this->m_ekskul->updateEkskul($id_ekskul, $ekskul_baru);
	// 				$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul baru diedit.</div>');
	// 				redirect('ekskul');
	// 			} else {
	// 				$upload_error = $this->upload->display_errors();
	// 				$this->session->set_flashdata('upload_error', '<div class="alert alert-warning font-weight-bold">' . $upload_error .  '</div>');
	// 				redirect('guru/edit/' . $id_ekskul);
	// 			}
	// 		} else {
	// 			$ekskul_baru = [
	// 				'nama_ekskul' => $this->input->post('nama_ekskul'),
	// 				'deskripsi' => $this->input->post('deskripsi'),
	// 			];

	// 			$this->m_ekskul->updateEkskul($id_ekskul, $ekskul_baru);
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Ekskul berhasil diedit.</div>');
	// 			redirect('ekskul');
	// 		}
	// 	}
	// }

	// public function hapus($id_ekskul)
	// {
	// 	$this->m_ekskul->deleteEkskul($id_ekskul);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-warning font-weight-bold">Ekskul berhasil dihapus.</div>');
	// 	redirect('ekskul');
	// }
}
