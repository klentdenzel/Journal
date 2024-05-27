<?php
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('register/login');
    }

    function login_process(){
        $email    = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE); 
        $validate = $this->User_model->validate($email,$password);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $name  = $data['complete_name'];
            $email = $data['email'];
            $level = $data['role'];
            $sesdata = array(
                'username'  => $name,
                'email'     => $email,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($level === '1'){
                redirect('#');
            // access login for staff
            }elseif($level === '2'){
                redirect('#');
            // access login for author
            }else{
                redirect('users');
            }
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
    }
    public function logout() {
        $this->session->unset_userdata(array('userid', 'username', 'email', 'logged_in'));
        $this->session->sess_destroy();
        redirect(base_url('home'));
    }

    public function login() {
        // Your authentication logic here...
        if ($this->form_validation->run() === TRUE) {
            $user = $this->User_model->get_user_by_username($this->input->post('username'));
    
            if ($user && password_verify($this->input->post('password'), $user->password)) {
                $session_data = array(
                    'username' => $user->username,
                    'profile_pic' => $user->profile_pic,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('login');
            }
        } else {
            $this->load->view('login');
        }
    }
    
    
}
?>
