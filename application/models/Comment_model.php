<?php
	class Comment_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_comments(){	
			$query = $this->db->get('comments');
			return $query->result_array();

			$query = $this->db->get_where('comments', array('comment_id' => $id));
			return $query->row_array();
    }
}