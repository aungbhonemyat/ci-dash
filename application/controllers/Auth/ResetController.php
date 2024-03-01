<?php

class ResetController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmployeeModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function password()
	{
		if($this->input->get('hash'))
		{	

			$hash = $this->input->get('hash');
			$this->data['hash'] = $hash;
			$getHashDetails = $this->EmployeeModel->getHashDetails($hash);
			if($getHashDetails !=false)
			{	
				$hash_expiry = $getHashDetails->hash_expiry;
				$currentDate = date('Y-m-d H:i');
				if($currentDate < $hash_expiry)
				{
					if($_SERVER['REQUEST_METHOD']=='POST')
					{
						$this->form_validation->set_rules('currentPassword', 'Current Password', 'required');
						$this->form_validation->set_rules('password', 'New Password', 'required');
						$this->form_validation->set_rules('cpassword', 'Confirm New Password', 'required|matches[password]');
						if ($this->form_validation->run() == TRUE) {

							$currentPassword = sha1($this->input->post('currentPassword'));
							$newPassword = $this->input->post('password');

							$validateCurrentPassword = $this->EmployeeModel->validateCurrentPassword($currentPassword,$hash);
							if($validateCurrentPassword !=false)
							{
								$newPassword = sha1($newPassword);
								$data = array(
									'password' => $newPassword,
									'hash_key' => null,
									'hash_expiry' => null,
								);

								$this->EmployeeModel->updateNewPasswrod($data,$hash);
								$this->session->set_flashdata('status','Successfully Change Password');
								redirect(base_url('index.php/login'));
							}
							else
							{
								$this->session->set_flashdata('status','Current password is wrong');
								$this->load->view('template/header.php');
								$this->load->view('auth/resetPassword.php',$this->data);
								$this->load->view('template/footer.php');
								
							}
						} else {
							$this->load->view('template/header.php');
							$this->load->view('auth/resetPassword.php',$this->data);
							$this->load->view('template/footer.php');
						}
					}
					else
					{
						$this->load->view('template/header.php');
						$this->load->view('auth/resetPassword.php',$this->data);
						$this->load->view('template/footer.php');
					}

				}
				else
				{
					$this->session->set_flashdata('status','link is expired');
					redirect(base_url('index.php/forgotpassword'));
				}
			}
			else
			{

			}
		}
		else
		{
			redirect(base_url('index.php/forgotpassword'));
		}
	}




}
