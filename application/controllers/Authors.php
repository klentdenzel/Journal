<?php
    class Authors extends CI_Controller{
        public function index(){
            $data['title'] = 'Authors Lists';

            $data['authors'] = $this->author_model->get_authors();

            $this->load->view('templates/header1');
			$this->load->view('authors/index', $data);
            $this->load->view('templates/footer2');

        }

        public function view($authorid = NULL){
            $data['author'] = $this->author_model->get_authors($authorid);
        

            $data['author_name'] = $data['author']['author_name'];

            // $this->load->view('templates/header1');
            $this->load->view('authors/view', $data);
            // $this->load->view('templates/footer2');
    }
    
        public function author_form() {
            $this->load->view('authors/register_author');
        }


        public function author_register_process() {

            $this->form_validation->set_rules('author_name', 'Author Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('con_num', 'Contact Number', 'required');
            
            if ($this->form_validation->run()) {
                // Configuration for file upload
                $config = array(
                    'upload_path' => './uploads/authors/',
                    'allowed_types' => 'jpg|png',
                    'encrypt_name' => TRUE // Encrypt the filename to avoid conflicts
                );
        
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    $file_data = $this->upload->data();
                    $file_name = $file_data['file_name'];
        
                    $data = array(
                        'author_name' => $this->input->post('author_name'),
                        'email' => $this->input->post('email'),
                        'contact_num' => $this->input->post('con_num'),
                        'image' => $file_name
                    );
        
                    $Author_model = new Author_model();
                    $inserted = $Author_model->register_author($data);
        
                    if ($inserted) {
                        $this->session->set_flashdata('status', 'Author Successfully Added!');
                        redirect(base_url('authors'));
                    } else {
                        $this->session->set_flashdata('error', 'Failed to add the author. Please try again.');
                    }
                } else {
                    // Error in file upload
                    $imageError = array('imageError' => $this->upload->display_errors());
                    // $this->load->view('users/register_user', $imageError);
                }
            }
        
            // If form validation fails or upload fails, reload the form
            $this->load->view('authors/register_author', $imageError);
        }


        public function delete_author($authorid) {
            if ($this->author_model->delete_author_id($authorid)) {
                $this->session->set_flashdata('message', 'Author deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete author.');
            }
            redirect('authors');
        }


        // public function edit_form($authorid = NULL) {
        //     $data['author'] = $this->author_model->get_authors($authorid);
        //     if (empty($data['author'])) {
        //         show_404();
        //     } else {
        //         $this->load->view('authors/edit_author', $data);
        //     }
        // }



        public function edit_form($authorid) {
            $data['author'] = $this->author_model->get_authors($authorid); // Adjust the method name if necessary
            $this->load->view('authors/edit_author', $data);
        }
    
        public function update_author_process() {
            $authorid = $this->input->post('audid');
            $data['author'] = $this->author_model->get_authors($authorid);
    
            $this->form_validation->set_rules('author_name', 'Author Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('contact_num', 'Contact Number', 'required');
    
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('authors/edit_author', $data);
            } else {
                $update_data = array(
                    'author_name' => $this->input->post('author_name'),
                    'email' => $this->input->post('email'),
                    'contact_num' => $this->input->post('contact_num')
                );
    
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path'] = './uploads/authors/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 5048;
                    $config['file_name'] = $authorid . '_' . $_FILES['image']['name'];
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('image')) {
                        $upload_data = $this->upload->data();
                        $update_data['image'] = $upload_data['file_name'];
                    } else {
                        $data['imageError'] = $this->upload->display_errors();
                        $this->load->view('authors/edit_author', $data);
                        return;
                    }
                }
    
                $this->author_model->update_author($authorid, $update_data);
                redirect('authors');
            }
        }
    
}