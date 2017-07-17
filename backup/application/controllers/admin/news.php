<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class News extends Main {

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
            'content' => 'Описание',
            'is_active' => 'Активна',
            'image' => 'Картинка',
            'date' => 'Дата'
        );
        $this->ckeditor = array('content');
        $this->cnt_per_page = 10;
        $this->table_rus = 'Новости';
    }

}
