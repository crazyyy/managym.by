<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_emails extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
           
            'email' => 'required',
            'course_id' => 'required'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'email' => 'Email',
            'course_id' => 'Курс',
            'date' => 'Дата',
            'is_active' => 'Активирован',
        );
        $this->ckeditor = array('comments');
        $this->cnt_per_page = 50;
        $this->table_rus = 'Контактные имейлы';
        $this->new_type = $this->new_type +
                array(
                    'course_id' => array('type' => 'select', 'lists' => 'courses'),
                    
                    
        );
    }

}
