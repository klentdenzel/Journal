<?php
class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view('register/registration');
    }

    public function register_process(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'complete_name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'pword' => $this->input->post('password'),
            );

            if($this->User_model->register($data)) {
                $this->session->set_flashdata('status', 'Registered Successfully! Go to Login.');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('status', 'Registration Failed!');
                redirect(base_url('register'));
            }
        }
    }
}
