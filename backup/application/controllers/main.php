<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database', TRUE);
      
    }

    function index() {
        $data = array();
		$meta = $this->database->get_metatags_by_page('/');
        $data = array(
            'title' => $meta['title'],
            'description' => $meta['description'],
            'keywords' => $meta['keywords'],
);
        $data['liverasti'] = $this->database->get_liverasti();
        $data['courses6'] = $this->database->get_courses(6);
        $data['courses'] = $this->database->get_courses();
        $data['ucomments'] = $this->database->get_user_comments();
        $data['ccomments'] = $this->database->get_company_comments();
        $this->load->view('main.tpl.php',$data);
    }

   

}
