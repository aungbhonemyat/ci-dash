<?php class RegisterController extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('authenticated'))
		{
			$this->session->set_flashdata('status','You are already logedin');
			redirect(base_url('index.php/dash'));
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

		function  index()
		{
			$this->load->view('template/header.php');
			$this->load->view('auth/register.php');
			$this->load->view('template/footer.php');
		}

	public function register()
	{
		$this->form_validation->set_rules('first_name','First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employee.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password'=> $this->input->post('password'), 
			);
			$this->load->model('EmployeeModel');
			$checking = $this->EmployeeModel->registerUser($data);

			if($checking)
			{
				$this->session->set_flashdata('status', 'Registered Succcessfully! Go to login');
				redirect(base_url('index.php/login'));
			}else
			{
				$this->session->set_flashdata('status', 'Something wrong! register again');
				redirect(base_url('index.php/register'));
			}

		}
	
	}



}
