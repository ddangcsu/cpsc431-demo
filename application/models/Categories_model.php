<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        $this->load->database();
    }

    // Function to select all the categories and build the result to return
    public function getCategories() {

        // get the First Set of parent data
        $sql = "SELECT a.categoryId, a.name, a.description
                from categories a
                where a.parentId is null";

        $query = $this->db->query($sql);

        if ($query) {
            $result = $query->result_array();
        } else {
            return Array();
        }

        // Get the sub categories based on the parent
        $query = null;
        $sql = "SELECT a.categoryId, a.name, a.description
                from categories a
                where a.parentId = ?";

        // Loop through each row of the result and pass it as a reference to
        // add child
        foreach ($result as &$row) {

            // Run a query and bind the categoryId
            $query = $this->db->query($sql, Array($row['categoryId']));

            // Add the child category
            if ($query) {
                $row['child'] = $query->result_array();
            } else {
                $row['child'] = Array();
            }
        }
        return $result;
    }

    // Function to add a new Category into the database
    public function setCategory($newData) {
        //TODO: To code up stuff in here
    }
}
