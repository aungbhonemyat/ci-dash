<?php

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('authenticated')) {
			$this->session->set_flashdata('status', 'You are already logedin');
			redirect(base_url('index.php/dash'));
		}
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('EmployeeModel');
	}
	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('auth/login.php');
		$this->load->view('template/footer.php');
	}

	public function login()
	{
		$this->form_validation->set_rules('email_id', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = [
				'email' => $this->input->post('email_id'),
				'password' => $this->input->post('password')
			];
			$user = new EmployeeModel;
			$result = $user->loginUser($data);
			if ($result != FALSE) {
				$auth_userdetail = [
					'first_name' => $result->first_name,
					'last_name' => $result->last_name,
					'email' => $result->email,
				];

				$this->session->set_userdata('authenticated', $result->role_as);
				$this->session->set_userdata('auth_user', $auth_userdetail);

				if ($result->role_as == 2) {
					$this->session->set_flashdata('status', 'Admin login successful!');
					redirect(base_url('index.php/dash/index'));
				} elseif ($result->role_as == 1) {
					$this->session->set_flashdata('status', 'User login successful!');
					redirect(base_url('index.php/dashuser/index'));
				} else {
					$this->session->set_flashdata('status', 'Unknown user role');
					redirect(base_url('index.php/login'));
				}
			} else {
				$this->session->set_flashdata('status', 'Invalid Email ID or Password');
				redirect(base_url('index.php/login'));
			}
		}
	}

	public function forgotPassword()
	{
		$this->load->model('EmployeeModel');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('email_id', 'Email Address', 'trim|required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				$this->forgotPassword();
			} else {
				$email = $this->input->post('email_id');
				$validateEmail = $this->EmployeeModel->validateEmail($email);
				if ($validateEmail != false) {
					$row = $validateEmail;
					$user_id = $row->id;

					$string = time() . $user_id . $email;
					$hash_string = hash('sha256', $string);
					$currentDate = date('Y-m-d H:i');
					$hash_expiry = date('Y-m-d H:i', strtotime($currentDate . '1 days'));
					$data = array(
						'hash_key' => $hash_string,
						'hash_expiry' => $hash_expiry,
					);

					$resetLink = base_url() . 'reset/password?hash=' . $hash_string;
					$message = '<p> Your reset password link is here:</p>' . $resetLink;
					$subject = "Password Reset Link"; 
					$sentStatus = $this->sendEmail($email, $subject, $message);
					if ($sentStatus == true) {
						$this->EmployeeModel->updatePasswordhash($data, $email);
						$this->session->set_flashdata('status', 'Reset password link successfully sent');
						redirect(base_url('index.php/forgotpassword'));
					} else {
						$this->session->set_flashdata('status', 'Email sending error');
						$this->load->view('template/header.php');
						$this->load->view('auth/forgotpassword.php');
						$this->load->view('template/footer.php');
					}
				} else {
					$this->session->set_flashdata('status', 'Invalid Email ID');
					$this->load->view('template/header.php');
					$this->load->view('auth/forgotpassword.php');
					$this->load->view('template/footer.php');
				}
			}
		} else {
			$this->load->view('template/header.php');
			$this->load->view('auth/forgotpassword.php');
			$this->load->view('template/footer.php');
		}
	}


	public function sendEmail($email,$subject,$message)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',

			'smtp_port' => 465,
			'smtp_user' => 'aungbhonemyat4@gmail.com',
			'smtp_pass' => '254553402aung4',

			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('aung');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
	{
		return true;
	}
	else
	{
		return false;
	}
	}
















}
