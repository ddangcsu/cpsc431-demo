<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load both the categories model and the articles model
        $this->load->model('articles_model', 'articles');
        $this->load->model('categories_model', 'categories');
    }

    public function index() {
        $data['article_list'] = $this->articles->getArticle(null, 6);
        //var_dump($data);
        $this->load->view('header');
        $this->load->view('main', $data);
        $this->load->view('footer');
    }

}
