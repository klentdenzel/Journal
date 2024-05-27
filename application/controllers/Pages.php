<?php
class Pages extends CI_Controller {

        public function __construct() {
                parent::__construct();
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->model('Home_model');
                
        }

public function view($page = 'home')
{

        $data['title'] = ucfirst($page);
        $data['articles'] = $this->article_model->get_articles();
        $data['comments'] = $this->comment_model->get_comments();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
}

public function home_show() {
        $this->load->model('Home_model');
        $this->load->model('Author_model');
        
        $data['volumes'] = $this->Home_model->get_published_volumes();
        $data['articles'] = $this->Home_model->get_published_articles();
        $authors = $this->Author_model->get_authors();
        
        // Merge author names into articles array
        foreach ($data['articles'] as &$article) {
        foreach ($authors as $author) {
                if ($author['audid'] == $article['audid']) {
                $article['author_name'] = $author['author_name'];
                break;
                }
        }
        }
        
        $this->load->view('templates/header');
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
}


}