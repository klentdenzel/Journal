<?php
	class Home_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}


public function get_published_volumes() {
    $this->db->select('*');
    $this->db->from('volumes');
    $this->db->where('published', 0);  // Assuming 0 indicates published
    $query = $this->db->get();
    return $query->result_array();
}

public function get_published_articles() {
    $this->db->select('articles.*, volumes.vol_name');
    $this->db->from('articles');
    $this->db->join('volumes', 'articles.volumeid = volumes.volumeid');
    $this->db->where('articles.published', 0);  // Assuming 0 indicates published
    $this->db->where('volumes.published', 0);   // Ensuring the volume is also published
    $query = $this->db->get();
    return $query->result_array();
}


    }