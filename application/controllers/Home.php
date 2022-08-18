<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_ekskul');
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
		
		$data['title'] = 'Detail Ekskul';
		$this->load->view('template-landing/header', $data);
		$this->load->view('template-landing/navbar', $data);
		$this->load->view('landing/detail-ekskul', $data);
		$this->load->view('template-landing/footer');
	}
	
	public function dashboard()
	{
		$data['total_kuis'] = $this->m_ekskul->totalKuis();
		
		$data['title'] = 'Dashboard';
		$this->load->view('template/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}
}
