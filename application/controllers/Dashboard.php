<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('dashboard');
		$this->load->view('template/footer.php');
	}
	
}
