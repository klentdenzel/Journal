<?php
	class Article_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_articles($id = null){    
			if($id !== null) {
				$query = $this->db->get_where('articles', array('articleid' =>$id));
				return $query->row_array();
			}
			else{
				$query = $this->db->get('articles');
				return $query->result_array(); 
			}
		}

		public function article_register($data) {
			return $this->db->insert('articles', $data);
		}


		public function delete_article_id($articleid) {
			$this->db->where('articleid', $articleid);
			return $this->db->delete('articles');
		}

		public function get_articles_volumes() {
			$this->db->select('articles.*, volumes.vol_name');
			$this->db->from('articles');
			$this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_article_by_id($articleid) {
			$this->db->select('articles.*, volumes.vol_name');
			$this->db->from('articles');
			$this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
			$this->db->where('articles.articleid', $articleid);
			$query = $this->db->get();
			return $query->row_array();
		}
		
		public function get_all_volumes() {
			$query = $this->db->get('volumes');
			return $query->result_array();
		}

		public function get_all_article() {
			$query = $this->db->get('articles');
			return $query->result_array();
		}

		public function update_article($articleid, $data) {
			$this->db->where('articleid', $articleid);
			return $this->db->update('articles', $data);
		}
		

}