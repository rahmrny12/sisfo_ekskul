<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_admin_login();
		$this->load->model('m_siswa');
		$this->load->model('m_guru');
		$this->load->model('m_ekskul');
	}

	public function index()
	{
		$data['siswa'] = $this->m_siswa->getSiswa();
		$data['ekskul'] = $this->m_ekskul->getEkskul()->result_array();

		$data['title'] = 'Daftar Siswa';
		$this->load->view('template-admin/header', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('template-admin/footer');
	}

	public function dashboard()
	{
		$data['total_ekskul'] = $this->m_ekskul->totalEkskul();
		$data['total_siswa'] = $this->m_siswa->totalSiswa();
		$data['total_guru'] = $this->m_guru->totalGuru();
		$data['ekskul_favorit'] = $this->m_ekskul->ekskulFavorit()->result_array();

		$data['title'] = 'Dashboard';
		$this->load->view('template-admin/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template-admin/footer');
	}

	public function detail($id_siswa)
	{
		$data['siswa'] = $this->m_siswa->getDetailSiswa($id_siswa)->row_array();
		$data['ekskul'] = $this->m_siswa->getEkskulSiswa($id_siswa)->result_array();

		$data['title'] = 'Detail Siswa';
		$this->load->view('template-admin/header', $data);
		$this->load->view('siswa/detail', $data);
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
						if ($ekskul['dikonfirmasi']) {
							$output .= '<a href="' . base_url('siswa/detail/') . $data['id_siswa'] . '">
										<span class="badge badge-pill badge-success py-3 px-4 mb-1">
											' . ucwords($ekskul['nama_ekskul']) . '
										</span>
									</a>';
						} else {
							$output .= '<a href="' . base_url('siswa/detail/') . $data['id_siswa'] . '">
							<span class="badge badge-pill badge-secondary py-3 px-4 mb-1">
							' . ucwords($ekskul['nama_ekskul']) . '
							</span>
							</a>';
						}
					}
				}

				$output .= '</h6>
						</td>
						<td>
							<a class="btn btn-secondary" href="' . base_url('siswa/detail/') . $data['id_siswa'] . '">
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

	public function daftar_ekskul()
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
			$this->load->view('siswa/daftar-ekskul', $data);
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
				redirect('siswa/daftar-ekskul');
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success font-weight-bold">Pendaftaran berhasil.</div>');
			redirect('siswa/daftar-ekskul');
		}
	}

	public function konfirmasi_ekskul()
	{
		$id_ekskul = $this->input->get('id_ekskul');
		$id_siswa = $this->input->get('id_siswa');
		$this->m_ekskul->confirmEkskul($id_ekskul, $id_siswa);
		redirect('siswa/detail/' . $id_siswa);
	}
}
