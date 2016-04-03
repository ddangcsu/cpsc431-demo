<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_model extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to return a form data for add or update
    public function getForm($articleId = NULL) {

        if (is_null($articleId)) {
            // New Form
            $data = array (
                'formTitle' => 'Add New Article',
                'formSubmit' => 'Add',
                'formAction' => 'articles/validate',
            );
        } else {
            // Update Form
            $data['formTitle'] = 'Update Article';
            $data['formSubmit'] = 'Update';
            $data['formAction'] = 'articles/validate';
        }
        return $data;
    }

    // Function to update Article
    public function updateArticle() {

        $data = $this->input->post(array('name', 'description', 'parentId'));
        if ($data['parentId'] === '') {
            $data['parentId'] = NULL;
        }

        // Set the where condition
        $this->db->where('categoryId', $this->input->post('categoryId'));

        // Run update on table
        if ($this->db->update('categories', $data)) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    // Function to add a new Category into the database
    public function insertArticle() {
        // Get form data to update
        $data = $this->input->post(array('name', 'description', 'parentId'));
        if ($data['parentId'] === '') {
            $data['parentId'] = NULL;
        }

        if ($this->db->insert('categories', $data)) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

}
