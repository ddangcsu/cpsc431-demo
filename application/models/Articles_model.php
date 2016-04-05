<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_model extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to return articles
    public function getArticle($articleId = NULL) {
        $categoryName = "(select name from categories
                    where categoryId = a.categoryId)
                AS categoryName";

        $this->db->select('*');
        $this->db->select($categoryName);

        if ( ! is_null($articleId)) {
            // When there is an article Id passed into it
            $this->db->where('articleId', $articleId);
        }

        // Retrieve and return data
        $query = $this->db->get('articles a');
        return $query->result_array();
    }

    // Function to return a form data for add or update
    public function getForm($articleId = NULL) {

        if (is_null($articleId)) {
            // New Form
            $data = array (
                'articleId' => NULL,
                'categoryId' => NULL,
                'title' => '',
                'content' => '',
                'createDate' => NULL,
                'modifiedDate' => NULL,
                'formTitle' => 'Add New Article',
                'formSubmit' => 'Add',
                'formAction' => 'articles/validate',
            );
        } else {
            // Update Form
            // Get data for the first row only
            $data = $this->getArticle($articleId)[0];
            $data['formTitle'] = 'Update Article';
            $data['formSubmit'] = 'Update';
            $data['formAction'] = 'articles/validate';
        }
        return $data;
    }

    // Function to update Article
    public function update() {

        $data = $this->input->post(array('categoryId', 'title', 'content'));
        $data['modifiedDate'] = date("Y-m-d");

        // Set the where condition
        $this->db->where('articleId', $this->input->post('articleId'));

        // Run update on table
        if ($this->db->update('articles', $data)) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    // Function to add a new article
    public function insert() {
        // Insert data
        $data = $this->input->post(array('categoryId', 'title', 'content'));
        $data['createdDate'] = date("Y-m-d");
        $data['modifiedDate'] = date("Y-m-d");

        if ($this->db->insert('articles', $data)) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    // Function to delete Article
    public function delete() {
        $articleId = $this->input->post('articleId');

        $this->db->where('articleId', $articleId)
                ->delete('articles');

        if ($this->db->affected_rows() > 0 ) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

}
