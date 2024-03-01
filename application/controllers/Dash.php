<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication');
		$this->Authentication->check_isAdmin();
	}
	function  index()
	{
		$this->load->view('template/header.php');
		$this->load->view('dash/index.php');
		$this->load->view('template/footer.php');
	}
}
