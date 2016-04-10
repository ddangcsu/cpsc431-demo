<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_model extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to return articles
    public function getArticle($articleId = NULL,$limit = NULL) {
        $categoryName = "(select name from categories
                    where categoryId = a.categoryId)
                AS categoryName";

        $this->db->select('*');
        $this->db->select($categoryName);

        if ( ! is_null($articleId)) {
            // When there is an article Id passed into it
            $this->db->where('articleId', $articleId);
        }

        if ( ! is_null($limit) && is_numeric($limit) && $limit > 0) {
            // Set limit only if valid.  Else just return all
            $this->db->limit($limit);
        }

        // Retrieve and return data
        $this->db->order_by('a.modifiedDate', 'DESC')
                ->order_by('a.createdDate', 'DESC');
        
        $query = $this->db->get('articles a');


        if ($query->num_rows() === 1 && ! is_null($articleId)) {
            return $query->result_array()[0];
        } else {
            return $query->result_array();
        }
    }

    // Function to return articles
    public function getArticleByCat($categoryId) {
        $this->db->select('a.*, b.*')
            ->from('articles a')
            ->join('categories b', 'a.categoryId = b.categoryId')
            ->where('a.categoryId', $categoryId);

        // Retrieve and return data
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
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
            $data = $this->getArticle($articleId);
            $data['formTitle'] = 'Update Article';
            $data['formSubmit'] = 'Update';
            $data['formAction'] = 'articles/validate';
        }
        return $data;
    }

    // Function to update Article
    public function update() {
        echo "In here";
        $data = $this->input->post(array('categoryId', 'title', 'content'));
        $data['modifiedDate'] = date("Y-m-d");

        // Set the where condition
        $this->db->where('articleId', $this->input->post('articleId'));

        // Run update on table
        $this->db->update('articles', $data);
        return $this->db->affected_rows();
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
