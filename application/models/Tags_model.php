<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags_model extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to return tags
    public function getTag($tagId = NULL) {
        $articleCount = "(select count(1) from articles_tags
                    where tagId = a.tagId)
                AS articleCount";

        $this->db->select('*');
        $this->db->select($articleCount);

        if ( ! is_null($tagId)) {
            // When there is an article Id passed into it
            $this->db->where('tagId', $tagId);
        }

        // Retrieve and return data
        $query = $this->db->get('tags a');
        return $query->result_array();
    }

    // Function to return data to fill in the form for either adding new
    // or update Tag The result data is an array
    public function getForm($tagId = NULL) {

        if (is_null($tagId)) {
            // New Category Form
            $data = array (
                'tagId' => NULL,
                'name' => '',
                'formTitle' => 'Add New Tag',
                'formSubmit' => 'Add',
                'formAction' => 'tags/validate',
            );
        } else {
            // Update Form
            // It's to update the category, we need to pull it from DB
            $query = $this->db->get_where('tags', array('tagId' => $tagId));
            $data = $query->result_array()[0];
            $data['formTitle'] = 'Update Tag';
            $data['formSubmit'] = 'Update';
            $data['formAction'] = 'tags/validate';
        }
        return $data;
    }

    // Function to update Category
    public function update() {
        // Get form data to update
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
    public function insert() {
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

    // Function to add a new Category into the database
    public function delete() {
        // Get form data to update
        $categoryId = $this->input->post('categoryId');

        // Update all children category to have the parent category
        $query = $this->db->select('parentId')
                    ->where('categoryId', $categoryId)
                    ->get('categories');

        if ($query) {
            $newParentId = $query->result_array()[0]['parentId'];
        }

        // Update all children categories of this delete category Id
        // and set the parentId to the parent of the delete CategoryId
        // We do not need to check how many row affected since if we delete
        // a child, it will not need to do anything for this step
        $this->db->where('parentId', $categoryId)
            ->update('categories', array('parentId'=>$newParentId));

        // Now we can delete the CategoryId
        $this->db->where('categoryId', $categoryId)
            ->delete('categories');

        if ($this->db->affected_rows() > 0) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }

    } // End deleteCategory

}
