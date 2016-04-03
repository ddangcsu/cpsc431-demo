<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    // Constructor to load the model (database)
    public function __construct() {
        parent::__construct();
        // Load both the categories model and the articles model
        $this->load->model('articles_model', 'articles');
        $this->load->model('categories_model', 'categories');
    }

    // This index function will automatically get call when Articles controller
    // is called
    public function index() {
        echo "Article controller";
    }

    // This function will load a form to update the category base on the
    // selected Id
    public function form($articleId = NULL) {

        //TODO: Code to show the update form and populate the data in there
        // from database
        if (is_null($articleId)) {
            // Pull Category Information for insert
            $data = $this->articles->getForm();

        } else {
            // Pull Category for update
            $data = $this->articles->getForm($articleId);
        }

        // Get a list of category tree
        $data['categoryOptions'] = $this->categories->getCatTree();

        // Load the view form
        $this->load->view('header');
        $this->load->view('articles/form', $data);
        $this->load->view('footer');

    }

    public function validate() {
        // Grab all the form Data
        $formData = $this->input->post(NULL, TRUE);

        var_dump($formData);
        // Method was call directly without any form information
        if ( empty($formData['formSubmit']) ) {
            redirect('articles');
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
            $this->load->view('categories/form', $formData);
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
        if ($this->articles->updateArticle()) {
            redirect('articles');
        } else {
            show_error('Have problem updating article');
        }
    }

    // This function will perform the actual add of the category
    private function add() {

        // Insert data
        if ($this->articles->insertArticle()) {
            redirect('articles');
        } else {
            show_error('Have problem add article');
        }

    }

}
