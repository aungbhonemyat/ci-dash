<?php
	class EmployeeModel extends CI_Model{

		public function loginUser($data)
		{
			$this->db->select('*');
			$this->db->where('email',$data['email']);
			$this->db->where('password',$data['password']);
			$this->db->from('employee');
			$this->db->limit(1);
			$query = $this->db->get();
			if($query -> num_rows() == 1) { return $query->row(); } else { return false; }
		}


		public function registerUser($data)
		{
			return $this->db->insert('employee',$data);
		}

		public function validateEmail($email)
		{
			$query = $this->db->query("SELECT * FROM employee WHERE email = '$email'");
			if($query -> num_rows() == 1 ){return $query->row();} else {return false; }
		}

		public function updatePasswordhash($data,$email)
		{
			$this->db->where('email',$email);
			$this->db->update('user',$data);
		}

		public function getHashDetails($hash)
		{
			$query = $this->db->query("SELECT * FROM employee WHERE hash_keys='$hash'");
			if($query -> num_rows() == 1) { return $query->row(); } else { return false; }
		}

		public function validateCurrentPassword($currentPassword,$hash)
		{
			$query = $this->db->query("SELECT * FROM employee WHERE password ='$currentPassword' AND hash_key='$hash'");
			if($query -> num_rows() == 1) { return $query->row(); } else { return false; }
		}

		 public function updateNewPasswrod($data,$hash)
		 {
			$this->db->where('hash_key',$hash);
			$this->db->update('employee',$data);
		 }

		//  Employee Index crud codes

		 public function create($formArray){
			$this->db->insert('employee',$formArray); // INSERT INTO users(name,email,created) values(?,?);
		}

		public function get_employee() {
			return $this->db->get('employee')->result_array();
		}

		function get_byid($emp_id){
			$this->db->where('id',$emp_id);
			return $categ =$this->db->get('employee')->row_array();
		}

		function update($formArray,$emp_id){
			$this->db->where('id',$emp_id);
			$this->db->update('employee',$formArray);
		}

		function delete($emp_id){
			$this->db->where('id',$emp_id);
			$this->db->delete('employee');
		}

		public function getRoleAs() {
			$roles = array(
				1 => 'user',
				2 => 'admin'
			);
			return $roles;
		}


	}

?>
