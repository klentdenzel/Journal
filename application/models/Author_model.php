<?php
	class Author_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_authors($id = null){    
			if($id !== null) {
				$query = $this->db->get_where('authors', array('audid' =>$id));
				return $query->row_array();
			}
			else{
				$query = $this->db->get('authors');
				return $query->result_array(); 
			}
		}
		

		public function register_author($data) {
			return $this->db->insert('authors', $data);
		}

		public function fetch_image() {
			// Retrieve image data
			$query = $this->db->get('authors')->result();
			return $query;
		}
	
		public function delete_author_id($authorid) {
			$this->db->where('audid', $authorid);
			return $this->db->delete('authors');
		}	
	
		public function update_author($authorid, $data) {
			$this->db->where('audid', $authorid);
			return $this->db->update('authors', $data);
		}
}