<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('ekskul/index');
		$this->load->view('template/footer.php');
	}
	
}
