<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

    // Constructor to load the model (database)
    public function __construct() {
        parent::__construct();
        // Pull in the Categories model
        $this->load->model('tags_model', 'tags');
    }

    // This index function will automatically get call
    public function index() {
        // Get data
        $data['tag_list'] = $this->tags->getTag();

        //var_dump($data);
        $this->load->view('header');
        $this->load->view('tags/listing', $data);
        $this->load->view('footer');
    }

    // This function will load a form to allow update or add tag
    public function form($tagId = NULL) {

        if (is_null($tagId)) {
            // Pull Category Information for insert
            $data = $this->tags->getForm();

        } else {
            // Pull Category for update
            $data = $this->tags->getForm($tagId);
        }
        // Load the view form
        $this->load->view('header');
        $this->load->view('tags/form', $data);
        $this->load->view('footer');

    }

    public function validate() {
        // Grab all the form Data
        $formData = $this->input->post(NULL, TRUE);

        // Method was call directly without any form information
        if ( empty($formData['formSubmit']) ) {
            redirect('tags');
        }

        // Set form valiation rules
        $this->form_validation->set_rules('name', 'Tag Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            // Regenerate the form again
            $this->load->view('header');
            $this->load->view('tags/form', $formData);
            $this->load->view('footer');
        } else {

            if ($formData['formSubmit'] === 'Add') {
                $this->add();
            } elseif ($formData['formSubmit'] === 'Update') {
                $this->update();
            }
        }
    }
    // This function will perform the actual update of the category
    private function update() {
        // Update data
        if ($this->tags->update()) {
            redirect('tags');
        } else {
            show_error('Have problem updating tag');
        }
    }

    // This function will perform the actual add of the category
    private function add() {

        // Insert data
        if ($this->tags->insert()) {
            redirect('tags');
        } else {
            show_error('Have problem add tag');
        }

    }

    // This function will perform the actual add of the category
    public function delete() {
        $tagId = $this->input->post('tagId');

        if (is_null($tagId)) {
            show_error('Invalid attempt to delete tag');
        }

        if ($this->tags->delete()) {
            redirect('tags');
        } else {
            show_error('Have problem delete tag ' . $tagId );
        }

    }

}
