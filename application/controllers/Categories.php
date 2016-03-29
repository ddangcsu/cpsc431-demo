<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function index() {
        $data = Array();
        $data['category_list'] = Array(
                Array('title'=>'Category number 1',
                    'description'=>'Category 1 Description',
                    'id'=>1
                ),
                Array('title'=>'Category number 2',
                    'description'=>'Category 2 Description',
                    'id'=>2
                ),
                Array('title'=>'Category number 3',
                    'description'=>'Category 3 Description',
                    'id'=>3
                ),
                Array('title'=>'Category number 4',
                    'description'=>'Category 4 Description',
                    'id'=>4
                ),
            );
        $this->load->view('header');
        $this->load->view('categories_content', $data);
        $this->load->view('footer');
    }

}
