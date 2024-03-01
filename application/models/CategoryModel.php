<?php
class CategoryModel extends CI_Model {
    

	public function create($formArray){
		$this->db->insert('categories',$formArray); // INSERT INTO users(name,email,created) values(?,?);
	}

	public function get_categories() {
		return $this->db->get('categories')->result_array();
	}

	function get_byid($categ_id){
		$this->db->where('id',$categ_id);
		return $categ =$this->db->get('categories')->row_array();
	}

	function update($formArray,$categ_id){
		$this->db->where('id',$categ_id);
		$this->db->update('categories',$formArray);
	}

	function delete($categ_id){
		$this->db->where('id',$categ_id);
		$this->db->delete('categories');
	}
}
?>
