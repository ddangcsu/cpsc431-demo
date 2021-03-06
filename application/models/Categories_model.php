<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to retrieve the category tree (hierachical data)
    // Code information from http://www.sitepoint.com/hierarchical-data-database/
    public function getCatTree($excludeId = NULL, $parent = NULL, $level = 0) {
        // Need to declare the static function
        $result = array();
        // Use CodeIgniter query builder class to create the SQL
        $sql = "a.categoryId, a.name, a.description,
                    a.parentId,
                    case WHEN a.parentId is NULL
                        THEN 'Root Level'
                        ELSE b.name
                    END
                    AS parentName,
                    (select count(1) from articles where categoryId = a.categoryId)
                    AS articleCount";

        $this->db->select($sql);
        $this->db->from('categories a');
        $this->db->join('categories b', 'a.parentId = b.categoryId', 'left');

        if ( is_null($parent) ) {
            $this->db->where('a.parentId', NULL);
        } else {
            $this->db->where('a.parentId', $parent);
        }

        if ( ! is_null($excludeId) ) {
            $this->db->where('a.categoryId <>', $excludeId);
        }

        $query = $this->db->get();

        foreach ($query->result_array() as &$row) {
            $row['level'] = $level;
            array_push($result, $row);
            // Merge the existing result with the recursive result
            $result = array_merge($result, $this->getCatTree(NULL, $row['categoryId'], $level+1));
        }

        return $result;
    }

    // Function to build a breadcrumb
    public function getBreadCrumb($categoryId) {
        // Need to declare the static function
        $result = array();
        if (is_null($categoryId)) {
            return $result;
        } else {
            $sql = 'a.categoryId, a.name, a.parentId,
                    (select count(1) from articles where categoryId = a.categoryId)
                    AS articleCount';
            $query = $this->db->select($sql)
                    ->get_where('categories a', array('a.categoryId' => $categoryId));

            if ($query->num_rows() !== 0) {
                $row = $query->result_array()[0];
                array_push($result, $row);
                return array_merge($this->getBreadCrumb($row['parentId']), $result);
            }
        }
    }

    // Function to return data to fill in the form for either adding new
    // category or update an existing category.  The result data is an array
    public function getForm($categoryId = NULL) {

        if (is_null($categoryId)) {
            // New Category Form
            $data = array (
                'categoryId' => NULL,
                'name' => '',
                'description' => '',
                'parentId' => NULL,
                'formTitle' => 'Add New Category',
                'formSubmit' => 'Add',
                'formAction' => 'categories/validate',
            );
        } else {
            // Update Form
            // It's to update the category, we need to pull it from DB
            $query = $this->db->get_where('categories', array('categoryId' => $categoryId));
            $data = $query->result_array()[0];
            $data['formTitle'] = 'Update Category';
            $data['formSubmit'] = 'Update';
            $data['formAction'] = 'categories/validate';
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
        $this->db->trans_start();

        $this->db->where('parentId', $categoryId)
            ->update('categories', array('parentId'=>$newParentId));

        // Now we can delete the CategoryId
        $this->db->where('categoryId', $categoryId)
            ->delete('categories');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }

    } // End deleteCategory

}
