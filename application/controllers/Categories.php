<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    // Constructor to load the model (database)
    public function __construct() {
        parent::__construct();
        // Pull in the Categories model
        $this->load->model('categories_model');

    }

    // This index function will automatically get call when Categories
    // Controller is called
    public function index() {
        // Pull category data from model and put it with a associated
        // category_list, which will become a variable later for
        // the view to use
        $data['category_list'] = $this->categories_model->getCatTree();

        //var_dump($data);
        $this->load->view('header');
        $this->load->view('categories_list', $data);
        $this->load->view('footer');
    }

    // This function will load a form to update the category base on the
    // selected Id
    public function form($categoryId = NULL) {

        //TODO: Code to show the update form and populate the data in there
        // from database
        if (is_null($categoryId)) {
            // Pull Category Information for insert
            $data = $this->categories_model->getForm();

        } else {
            // Pull Category for update
            $data = $this->categories_model->getForm($categoryId);
        }

        // Get the parentOptions and exclude the one that we are modifying
        $data['parentOptions'] = $this->categories_model->getCatTree($data['categoryId']);

        // Load the view form
        $this->load->view('header');
        $this->load->view('categories_form', $data);
        $this->load->view('footer');

    }

    public function validate() {
        // Grab all the form Data
        $formData = $this->input->post(NULL, TRUE);

        var_dump($formData);
        // Method was call directly without any form information
        if ( empty($formData['formSubmit']) ) {
            redirect('categories');
        }

        // Method call through a form
        if ($formData['parentId'] === '') {
            $formData['parentId'] = NULL;
        }

        if ($formData['categoryId'] === '') {
            $formData['categoryId'] = NULL;
        }

        // Set form valiation rules
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        $this->form_validation->set_rules('description', 'Category Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            // Need to repull the parent categories options
            $formData['parentOptions'] = $this->categories_model->getCatTree($formData['categoryId']);

            // Regenerate the form again
            $this->load->view('header');
            $this->load->view('categories_form', $formData);
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
        if ($this->categories_model->updateCategory()) {
            redirect('categories');
        } else {
            show_error('Have problem updating category');
        }
    }

    // This function will perform the actual add of the category
    private function add() {

        // Insert data
        if ($this->categories_model->insertCategory()) {
            redirect('categories');
        } else {
            show_error('Have problem add category');
        }

    }

}
