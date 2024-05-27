<?php
	class Volume_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_volumes($id = null) {
			if ($id === null) {
				$query = $this->db->get('volumes');
				return $query->result_array();
			} else {
				$query = $this->db->get_where('volumes', array('volumeid' => $id));
				return $query->row_array();
			}
		}

		// Add Volume
		public function volume_register($data) {
			return $this->db->insert('volumes', $data);
		}

		public function fetch_image() {
			// Retrieve image data
			$query = $this->db->get('volumes')->result();
			return $query;
		}

		public function update_volume($volumeid, $data) {
			$this->db->where('volumeid', $volumeid);
			return $this->db->update('volumes', $data);
		}
		public function delete_volume_id($volumeid) {
			$this->db->where('volumeid', $volumeid);
			return $this->db->delete('volumes');
		}	

		public function get_all_articles() {
			$query = $this->db->get('articles');
			return $query->result_array();
		}


		
}
