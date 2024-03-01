<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashuser extends CI_Controller
{

	public function accessdenied()
	{
		$this->load->view('template/header.php');
		$this->load->view('error/403.php');
		$this->load->view('template/footer.php');
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication');
	}

	public function  index()
	{
		$this->load->view('template/header.php');
		$this->load->view('dash/dashuser.php');
		$this->load->view('template/footer.php');
	}
}
