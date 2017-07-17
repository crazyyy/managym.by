<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Make_files extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database',TRUE);
        $this->load->helper('text');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $data['lists'] = $this->database->get_lists();
            $this->load->view('admin/make_files.tpl.php', $data);
        } else {
            redirect('/admin/index');
        }
    }

    function orders() {

        $query = $this->db->query("SELECT * FROM rasti_orders");
        $query = $query->result_array();

        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/views/content/orders.csv', 'w+');
        foreach ($query as $q) {
            $manager = $this->database->get_field('rasti_managers', $q['manager_id'], 'name');
            $course = $this->database->get_field('rasti_courses', $q['course_id'], 'name');
            $status = $this->database->get_field('rasti_status', $q['status'], 'name');
            fwrite($fp, mb_convert_encoding($q['id'], 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($q['name'], 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($q['phone'], 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($q['email'], 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($q['company'], 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($manager, 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($course, 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding($status, 'Windows-1251', 'UTF-8') . ';' .
                    mb_convert_encoding(date('d.m.Y', $q['date']), 'Windows-1251', 'UTF-8') . ';' . "\r\n");
        }

        fclose($fp);
        header("Content-Type: text/plain; charset=Windows-1251");
        header("Content-Disposition: attachment; filename=orders.csv");
        //header("Content-Length: " . strlen('orders.csv'));
        readfile($_SERVER['DOCUMENT_ROOT'] . '/views/content/orders.csv');
    }

}