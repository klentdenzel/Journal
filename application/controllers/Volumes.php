<?php
    class Volumes extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('Volume_model');
            $this->load->library('session');
        }

        public function index() {
            $data['title'] = 'Volumes Lists';
        
            // Load the Volume_model
            $this->load->model('Volume_model');
            // Get volumes data
            $data['volumes'] = $this->Volume_model->get_volumes();
            // Get image data
            $data['image'] = $this->Volume_model->fetch_image();
        
            $this->load->view('templates/header1');
            $this->load->view('volumes/index', $data);
            $this->load->view('templates/footer2');
        }
        

        public function view($volumeid = NULL) {
            $data['volume'] = $this->Volume_model->get_volumes($volumeid);
            if (empty($data['volume'])) {
                show_404();
            } else {
                $this->load->view('volumes/view', $data);
            }
        }
    
        public function details($volumeid = NULL) {
            $data['volume'] = $this->Volume_model->get_volumes($volumeid);
            if (empty($data['volume'])) {
                show_404();
            } else {
                $this->load->view('volumes/details', $data);
            }
        }
    
        public function volume_form() {
            $this->load->view('volumes/add_volume');
        }
    
        public function volume_register_process() {
            $this->form_validation->set_rules('volume_name', 'Volume Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            
            if ($this->form_validation->run()) {
                // Configuration for file upload
                $config = array(
                    'upload_path' => './uploads/volumes/',
                    'allowed_types' => 'jpg|png',
                    'encrypt_name' => TRUE // Encrypt the filename to avoid conflicts
                );
        
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    $file_data = $this->upload->data();
                    $file_name = $file_data['file_name'];
        
                    $data = array(
                        'vol_name' => $this->input->post('volume_name'),
                        'description' => $this->input->post('description'),
                        'image' => $file_name
                    );
        
                    $Volume_model = new Volume_model();
                    $inserted = $Volume_model->volume_register($data);
        
                    if ($inserted) {
                        $this->session->set_flashdata('status', 'Volume Successfully Added!');
                        redirect(base_url('volumes'));
                    } else {
                        $this->session->set_flashdata('error', 'Failed to add volume. Please try again.');
                    }
                } else {
                    // Error in file upload
                    $imageError = array('imageError' => $this->upload->display_errors());
                    $this->load->view('volumes/add_volume', $imageError);
                }
            }
        
            // If form validation fails or upload fails, reload the form
            $this->load->view('volumes/add_volume');
        }
        

        public function edit_volume_form($volumeid = NULL) {
            $data['volume'] = $this->Volume_model->get_volumes($volumeid);
            if (empty($data['volume'])) {
                show_404();
            } else {
                $this->load->view('volumes/view', $data);
            }
        }
    
        public function update_volume_process() {
            $volumeid = $this->input->post('volumeid');
            $data['volume'] = $this->Volume_model->get_volumes($volumeid);
    
            $this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
    
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header1');
                $this->load->view('volumes/view', $data);
                $this->load->view('templates/footer2');
            } else {
                $update_data = array(
                    'vol_name' => $this->input->post('vol_name'),
                    'description' => $this->input->post('description'),
                );
    
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path'] = './uploads/volumes/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 5048;
                    $config['file_name'] = $volumeid . '_' . $_FILES['image']['name'];
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('image')) {
                        $upload_data = $this->upload->data();
                        $update_data['image'] = $upload_data['file_name'];
                    } else {
                        $data['imageError'] = $this->upload->display_errors();
                        $this->load->view('templates/header1');
                        $this->load->view('volumes/view', $data);
                        $this->load->view('templates/footer2');
                        return;
                    }
                }
    
                $this->Volume_model->update_volume($volumeid, $update_data);
                redirect('volumes');
            }
        }

        public function delete_volume($volumeid) {
            if ($this->Volume_model->delete_volume_id($volumeid)) {
                $this->session->set_flashdata('message', 'Volume deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete volume.');
            }
            redirect('volumes');
        }

        public function toggle_archive($volumeid) {
            $volume = $this->Volume_model->get_volumes($volumeid);
            $new_status = $volume['archives'] ? 0 : 1;
            $this->Volume_model->update_volume($volumeid, ['archives' => $new_status]);
            redirect('volumes');
        }
        
        public function toggle_publish($volumeid) {
            $volume = $this->Volume_model->get_volumes($volumeid);
            $new_status = $volume['published'] ? 0 : 1;
            $this->Volume_model->update_volume($volumeid, ['published' => $new_status]);
            redirect('volumes');
        }
        
}

?>
