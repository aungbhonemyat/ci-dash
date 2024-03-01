<?php class Employee extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmployeeModel');
	}

	public function index()
	{
		$data['employee'] = $this->EmployeeModel->get_employee();
		$this->load->view('template/header.php');
		$this->load->view('employee/index', $data);
		$this->load->view('template/footer.php');
	}

	public function create() {
		$this->load->library('form_validation');
		$this->load->model('EmployeeModel');

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employee.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['roles'] = $this->EmployeeModel->getRoleAs();
			$this->load->view('template/header');
			$this->load->view('employee/empCreate', $data);
			$this->load->view('template/footer');
		} else {
			$formArray = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'role_as' => $this->input->post('role_as'),
			);
			$insertId = $this->EmployeeModel->create($formArray);
			if ($insertId) {
				$this->session->set_flashdata('status', 'Employee added successfully');
			} else {
				$this->session->set_flashdata('error', 'Failed to add employee');
			}
			redirect('employee/index');
		}
	}

	public function edit($emp_id)
	{
	
		$this->load->view('template/header.php');
		$this->load->view('template/footer.php');
		$this->load->model('EmployeeModel');

		$employee = $this->EmployeeModel->get_byid($emp_id);
		if (!$employee) {
			redirect(base_url() . 'index.php/employee/index');
		}

		$roles = $this->EmployeeModel->getRoleAs();
		$this->load->library('form_validation');
    
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('role_as', 'Role', 'required');
		if ($this->form_validation->run() === false) {
			$this->load->view('employee/empEdit', ['employee' => $employee, 'roles' => $roles]);
		} else {
			$formArray = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'role_as' => $this->input->post('role_as')
			);
			$this->EmployeeModel->update($formArray, $emp_id);
			$this->session->set_flashdata('status', 'Employee record updated successfully');
			redirect(base_url() . 'index.php/employee/index');
		}
	}

	function delete($emp_id)
	{
		$this->load->model('EmployeeModel');
		$emp = $this->EmployeeModel->get_byid($emp_id);

		if (empty($emp_id)) {
			$this->session->set_flashdata('status', 'Record not found in database');
			redirect(base_url() . 'index.php/employee/index');
		}
		$this->EmployeeModel->delete($emp_id);
		$this->session->set_flashdata('status', 'Record deleted Successfully');
		redirect(base_url() . 'index.php/employee/index');
	}
}
