<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Static_page extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'title' => 'required'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'title' => 'Заголовок',
            'url' => 'Url',
            'page' => 'Контент'
        );
        $this->ckeditor = array('page');
        $this->cnt_per_page = 3;
        $this->table_rus = 'Статические страницы';
    }

}
