<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Categories extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'name' => 'required'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name' => 'Название',
            'pic' => 'Картинка',
        );
        $this->ckeditor = array('content');
        $this->cnt_per_page = 10;
        $this->table_rus = 'Категории';
        $this->filter = array('name' => array('table' => 'subcategories', 'field' => 'c_id', 'value' => 'id'));
    }

}
