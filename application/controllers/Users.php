<?php
    class Users extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('User_model');
            $this->load->library('session');
        }
    
        //display names
        public function index(){
            $data['title'] = 'User Lists';

            $this->load->model('User_model');
            $data['user'] = $this->user_model->get_users();
            // Get image dataz
            $data['profile_pic'] = $this->User_model->fetch_image();

            $this->load->view('templates/header1');
			$this->load->view('users/index', $data);
            $this->load->view('templates/footer2');
        }

        //view user details
        public function view($userid = NULL) {
            $data['user'] = $this->user_model->get_users($userid);
            if (empty($data['user'])) {
                show_404();
            } else {
                $this->load->view('users/view', $data);
            }
        }
    
        public function edituser($userid = NULL) {
            $data['user'] = $this->user_model->get_users($userid);
            if (empty($data['user'])) {
                show_404();
            } else {
                $this->load->view('users/edituser', $data);
            }
        }
    
        public function user_form() {
            $this->load->view('users/register_user');
        }

        
        public function user_register_process() {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run()) {
                // Configuration for file upload
                $config = array(
                    'upload_path' => './uploads/users/',
                    'allowed_types' => 'jpg|png',
                    'encrypt_name' => TRUE // Encrypt the filename to avoid conflicts
                );
        
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    $file_data = $this->upload->data();
                    $file_name = $file_data['file_name'];
        
                    $data = array(
                        'complete_name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'pword' => $this->input->post('password'),
                        'profile_pic' => $file_name
                    );
        
                    $User_model = new User_model();
                    $inserted = $User_model->register($data);
        
                    if ($inserted) {
                        $this->session->set_flashdata('status', 'User Successfully Added!');
                        redirect(base_url('users'));
                    } else {
                        $this->session->set_flashdata('error', 'Failed to add user. Please try again.');
                    }
                } else {
                    // Error in file upload
                    $imageError = array('imageError' => $this->upload->display_errors());
                    // $this->load->view('users/register_user', $imageError);
                }
            }
        
            // If form validation fails or upload fails, reload the form
            $this->load->view('users/register_user', $imageError);
        }

        
        public function delete_user($userid) {
            if ($this->User_model->delete_user_id($userid)) {
                $this->session->set_flashdata('message', 'User deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete user.');
            }
            redirect('users');
        }


        public function edit_form($userid = NULL) {
            $data['user'] = $this->User_model->get_users($userid);
            if (empty($data['user'])) {
                show_404();
            } else {
                $this->load->view('users/edituser', $data);
            }
        }
    
        // Function to handle the form submission and update user details
        public function update_user_process() {
            $userid = $this->input->post('userid');
            $data['user'] = $this->User_model->get_users($userid);
    
            $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('users/edituser', $data);
                $this->load->view('templates/footer');
            } else {
                $update_data = array(
                    'complete_name' => $this->input->post('complete_name'),
                    'email' => $this->input->post('email'),
                    'pword' => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // Securely hash the password
                );
    
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path'] = './uploads/users/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 5048;
                    $config['file_name'] = $userid . '_' . $_FILES['image']['name'];
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('image')) {
                        $upload_data = $this->upload->data();
                        $update_data['profile_pic'] = $upload_data['file_name'];
                    } else {
                        $data['imageError'] = $this->upload->display_errors();
                        $this->load->view('templates/header');
                        $this->load->view('users/edituser', $data);
                        $this->load->view('templates/footer');
                        return;
                    }
                }
    
                $this->User_model->update_user($userid, $update_data);
                redirect('users');
            }
        }
}

