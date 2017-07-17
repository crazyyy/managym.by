<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database', TRUE);
        /* if (!$this->session->userdata('admin'))
          if ($this->session->userdata('logged_in'))
          redirect('/');
          else
          redirect('/admin/auth'); */
    }

    function index() {
        $data = array(
            'lists' => $this->database->get_lists()
        );
        $data_main['template'] = $this->load->view('/admin/index.tpl.php', $data, TRUE);
        $this->load->view('/admin/main.tpl.php', $data_main);
    }

}
