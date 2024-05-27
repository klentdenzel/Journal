<?php
    class Articles extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('article_model');
            $this->load->model('volume_model');
        }

        public function index() {
            $this->load->model('Article_model');
            $this->load->model('Author_model');
            
            $articles = $this->article_model->get_articles_volumes();
            $authors = $this->author_model->get_authors();
        
            // Merge author names into the articles array
            foreach ($articles as &$article) {
                foreach ($authors as $author) {
                    if ($author['audid'] == $article['audid']) {
                        $article['author_name'] = $author['author_name'];
                        break;
                    }
                }
            }
        
            $data['articles'] = $articles;
            $data['authors'] = $authors;
        
            $this->load->view('templates/header1');
			$this->load->view('articles/index', $data);
            $this->load->view('templates/footer2');
        }

        

        public function view($articleid = NULL){
            $data['article'] = $this->article_model->get_article_by_id($articleid);
            $data['volumes'] = $this->article_model->get_all_volumes();
            $this->load->view('articles/view', $data);
    }

    //     public function article_form() {
    //         $this->load->view('articles/add_article');
    // }

    public function view_edit($articleid = NULL){
        $data['article'] = $this->article_model->get_article_by_id($articleid);
        $data['volumes'] = $this->article_model->get_all_volumes();
        $this->load->view('articles/view', $data);
    }
    


    public function add() {
        $data['volumes'] = $this->volume_model->get_volumes();
        $data['authors'] = $this->author_model->get_authors();
        $this->load->view('articles/add_article', $data);
    }


    public function article_register_process() {
        $this->form_validation->set_rules('article_title', 'Article Name', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('doi', 'DOI', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('volumeid', 'Volume', 'required');
        $this->form_validation->set_rules('authorid', 'Author', 'required');
        
        if ($this->form_validation->run()) {
            // Configuration for file upload
            $config = array(
                'upload_path' => './uploads/articles/',
                'allowed_types' => 'pdf',
                'encrypt_name' => TRUE // Encrypt the filename to avoid conflicts
            );
    
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];
    
                $data = array(
                    'title' => $this->input->post('article_title'),
                    'abstract' => $this->input->post('abstract'),
                    'doi' => $this->input->post('doi'),
                    'keywords' => $this->input->post('keywords'),
                    'volumeid' => $this->input->post('volumeid'),
                    'audid' => $this->input->post('authorid'),
                    'filename' => $file_name
                );
    
                $this->load->model('Article_model');
                $inserted = $this->Article_model->article_register($data);
    
                if ($inserted) {
                    $this->session->set_flashdata('status', 'Article Successfully Added!');
                    redirect(base_url('articles'));
                } else {
                    $this->session->set_flashdata('error', 'Failed to add article. Please try again.');
                    $this->load->view('articles/add_articles');
                }
            } else {
                // Error in file upload
                $fileError = array('fileError' => $this->upload->display_errors());
                $this->load->view('articles/add_articles', $fileError);
            }
        } else {
            // If form validation fails, reload the form
            $this->load->view('articles/add_articles');
        }
    }

    public function delete_article($articleid) {
        if ($this->article_model->delete_article_id($articleid)) {
            $this->session->set_flashdata('message', 'Article deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete article.');
        }
        redirect('articles');
    }

    public function edit_form($articleid) {
        $data['article'] = $this->article_model->get_articles($articleid);
        $data['volumes'] = $this->volume_model->get_volumes();
        $this->load->view('articles/view', $data);
    }

    public function update_article_process() {
        $articleid = $this->input->post('articleid');
        $volumeid = $this->input->post('volumeid');
        $data['volumes'] = $this->volume_model->get_all_volumes(); // Assuming this method gets all volumes
    
        // Fetch the existing article data
        $data['article'] = $this->article_model->get_article($articleid);
    
        $this->form_validation->set_rules('article_title', 'Article Title', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('doi', 'DOI', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('volumeid', 'Volume', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header1');
            $this->load->view('articles/edit_form', $data);
            $this->load->view('templates/footer2');
        } else {
            $update_data = array(
                'title' => $this->input->post('article_title'),
                'abstract' => $this->input->post('abstract'),
                'doi' => $this->input->post('doi'),
                'keywords' => $this->input->post('keywords'),
                'volumeid' => $this->input->post('volumeid'),
            );
    
            // Check if a file is uploaded
            if (!empty($_FILES['filename']['name'])) {
                // Configuration for file upload
                $config['upload_path'] = './uploads/articles/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 5048;
                $config['file_name'] = $volumeid . '_' . $_FILES['filename']['name'];
    
                $this->load->library('upload', $config);
    
                // Upload the file
                if ($this->upload->do_upload('filename')) {
                    $upload_data = $this->upload->data();
                    $update_data['filename'] = $upload_data['file_name'];
                } else {
                    // If upload fails, show error message
                    $data['imageError'] = $this->upload->display_errors();
                    $this->load->view('templates/header1');
                    $this->load->view('articles/edit_form', $data);
                    $this->load->view('templates/footer2');
                    return;
                }
            }
    
            // Update the article in the database
            $this->article_model->update_article($articleid, $update_data);
            redirect('articles');
        }
    }
    
    // Model Method to Update Article
    public function update_article($articleid, $data) {
        $this->db->where('articleid', $articleid);
        return $this->db->update('articles', $data);
    }
    

    public function delete_volume($volumeid) {
        if ($this->Volume_model->delete_volume_id($volumeid)) {
            $this->session->set_flashdata('message', 'Volume deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete volume.');
        }
        redirect('volumes');
    }

    public function toggle_publish($articleid) {
        $article = $this->article_model->get_articles($articleid);
        $new_status = $article['published'] ? 0 : 1;
        $this->article_model->update_article($articleid, ['published' => $new_status]);
        redirect('articles');
    }

}