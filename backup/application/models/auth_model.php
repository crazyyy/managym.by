<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('cookie'));
        if ($this->session->userdata('logged_in') != 1)
            if (isset($_COOKIE['rhash'])) {
                $rhash = get_cookie('rhash', TRUE);
                $query = $this->db->get_where('users', 'rhash = "' . $rhash . '"', 1);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();
                    $admin = ($row['rights'] == 777 ? TRUE : FALSE);
                    $newdata = array(
                        'user_id' => $row['id'],
                        'admin' => $admin,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);
                }
            }
    }

    function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('auth[login]', 'Логин', 'required|max_length[255]|valid_email|xss_clean');
        $this->form_validation->set_rules('auth[pass]', 'Пароль', 'required|xss_clean|md5');
        $this->form_validation->set_rules('auth[remember]', 'Запомнить меня', 'xss_clean');

        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            extract($_POST);
            $sql = 'SELECT * FROM users WHERE login = "' . $auth['login'] . '" AND pass = "' . $auth['pass'] . '" AND is_active = 1';
            if ($query = $this->db->query($sql)) {
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();

                    $admin = ($row['rights'] == 777 ? TRUE : FALSE);
                    $vals = array(
                        'user_id' => $row['id'],
                        'admin' => $admin,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($vals);

                    if (isset($auth['remember'])) {
                        $hash = md5($auth['login'] . $auth['login'] . time());
                        $this->db->update('users', array('rhash' => $hash), 'id = ' . $row['id']);
                        $cookie = array(
                            'name' => 'rhash',
                            'value' => $hash,
                            'expire' => '0'
                        );
                        set_cookie($cookie);
                    }
                    return true;
                } else {
                    return false;
                }
            }
            else
                return false;
        }
    }

}