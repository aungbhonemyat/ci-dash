<?php
class Categories extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		$this->load->model('CategoryModel');
	}

	public function index() {
		$data['categories'] = $this->CategoryModel->get_categories();
		$this->load->view('template/header.php');
		$this->load->view('categories/index', $data);
		$this->load->view('template/footer.php');
		
	}

	function create()
	{
		$this->load->view('template/header.php');
		$this->load->view('template/footer.php');
		$this->load->model('CategoryModel');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description');
		if ($this->form_validation->run() == false) {
			$this->load->view('categories/create');
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['description'] = $this->input->post('description');
			$this->CategoryModel->create($formArray);
			$this->session->set_flashdata('status', 'Category added successfully');
			redirect(base_url() . 'index.php/categories/index');
		}
	}

	function edit($categ_id)
	{
		$this->load->view('template/header.php');
		$this->load->view('template/footer.php');
		$this->load->model('CategoryModel');
		$category = $this->CategoryModel->get_byid($categ_id);
		$data = array();
		$data['category'] = $category;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description');
		if ($this->form_validation->run() === false) {
			$this->load->view('categories/edit', $data);
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['description'] = $this->input->post('description');
			$this->CategoryModel->update($formArray, $categ_id);
			$this->session->set_flashdata('status', 'Record updated Successfully');
			redirect(base_url() . 'index.php/categories/index');
		}
	}

	function delete($categ_id)
	{
		$this->load->model('CategoryModel');
		$categ = $this->CategoryModel->get_byid($categ_id);

		if (empty($categ)) {
			$this->session->set_flashdata('status', 'Record not found in database');
			redirect(base_url() . 'index.php/categories/index');
		}
		$this->CategoryModel->delete($categ_id);
		$this->session->set_flashdata('status', 'Record deleted Successfully');
		redirect(base_url() . 'index.php/categories/index');
	}

	
}
