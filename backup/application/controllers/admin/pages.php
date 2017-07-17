<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Pages extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'url' => 'required'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'url' => 'Url',
            'content_top' => 'Контент (верх)',
            'content_bottom' => 'Контент (низ)'
        );
        $this->ckeditor = array('content_top', 'content_bottom');
        $this->table_rus = 'Страницы сайта';
    }

}
