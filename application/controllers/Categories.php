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
        $data['category_list'] = $this->categories_model->getCategories();

        //var_dump($data);
        $this->load->view('header');
        $this->load->view('categories_list', $data);
        $this->load->view('footer');
    }

    // This function will load a form to update the category base on the
    // selected Id
    public function getForm($categoryId = FALSE) {

        //TODO: Code to show the update form and populate the data in there
        // from database
        if ($categoryId === FALSE) {
            $data['formName'] = 'Add Category';
            $data['formAction'] = 'categories/add';
            $data['name'] = '';
            $data['description'] = '';
            $data['parentId'] = '';
            $data['level'] = '';

            //TODO: Display the empty form for adding new category
        } else {
            $data['formName'] = 'Update Category';
            $data['formAction'] = 'categories/update';
            $data['name'] = 'Some Dummy category';
            $data['description'] = 'This is a dummy category description';
            $data['parentId'] = 2;
            $data['level'] = 2;
            $data['categoryId'] = $categoryId;
            //TODO: Pull the data from the database and populate the form
            // to update
        }

        // Load the view form
        $this->load->view('header');
        $this->load->view('categories_form', $data);
        $this->load->view('footer');

    }

    // This function will perform the actual update of the category
    public function update() {

        //TODO: Code up the function that will update the Category
        echo "Function update ";
        echo "<br>";
        echo "Name is: " . $this->input->post('name');
        echo "<br>";
        echo "Description is: " . $this->input->post('description');
        echo "<br>";
        echo "Parent Id is: " . $this->input->post('parentId');
        echo "<br>";
        // Reload the Categories List after done.
        //$this->index();
    }

    // This function will perform the actual add of the category
    public function add() {
        //TODO: code to gather form data and add it to database
        echo "Function add";
    }

}
