<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('Auth_model', 'auth', TRUE);
    }

    function index() {
        $this->auth();
    }

    function auth() {
        if ($this->session->userdata('logged_in'))
            redirect('/admin/index');

        $is_login = $this->auth->login($_POST);

        if ($is_login === TRUE)
            redirect('/admin/index');
        elseif (isset($_POST['auth']) && $is_login === FALSE)
            $error = TRUE;
        else
            $error = FALSE;

        $data = array(
            'error' => $error
        );

        $data_main['template'] = $this->load->view('/admin/login.tpl.php', $data, TRUE);
        $this->load->view('/admin/main.tpl.php', $data_main);
    }

    function deauth() {
        $this->session->sess_destroy();
        delete_cookie('rhash');
        redirect('/admin/auth');
    }

}

?>
