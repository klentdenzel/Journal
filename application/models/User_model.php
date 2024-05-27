<?php
class User_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

	function validate($email,$password){
		$this->db->where('email',$email);
		$this->db->where('pword',$password);
		$result = $this->db->get('users',1);
		return $result;
	}
	

    public function get_users($id = null) {
        if($id !== null) {
            $query = $this->db->get_where('users', array('userid' => $id));
            return $query->row_array();
        } else {
            $query = $this->db->get('users');
            return $query->result_array();
        }
    }

    // Add User
    public function register($data) {
        return $this->db->insert('users', $data);
    }

	public function fetch_image() {
		// Retrieve image data
		$query = $this->db->get('users')->result();
		return $query;
	}

	public function delete_user_id($userid) {
		$this->db->where('userid', $userid);
		return $this->db->delete('users');
	}	

	public function update_user($userid, $data) {
        $this->db->where('userid', $userid);
        return $this->db->update('users', $data);
    }
	
}

