<?php
	class ItemModel extends CI_Model{


		function all(){
			return $items =$this->db->get('items')->result_array();
	   }
	   
		function create($formArray){
			$this->db->insert('items',$formArray); // INSERT INTO users(name,email,created) values(?,?);
		}


		function getuser($item_id){
			$this->db->where('id',$item_id);
			return $item =$this->db->get('items')->row_array();
		}

		function update($formArray,$item_id){
			$this->db->where('id',$item_id);
			$this->db->update('items',$formArray);
		}

		function delete($item_id){
			$this->db->where('id',$item_id);
			$this->db->delete('items');
		}
		public function group_items_by_category() {
			$this->db->select('categories.name AS category_name, items.*');
			$this->db->from('items');
			$this->db->join('categories', 'items.category_id = categories.id', 'left');
			$this->db->order_by('categories.name', 'ASC');
			$this->db->order_by('items.name', 'ASC');
			$query = $this->db->get();
			return $query->result_array();
		}
		


	}
?>
