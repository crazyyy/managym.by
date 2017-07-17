<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_orders extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'name' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'email' => 'required',
            'course_id' => 'required'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'company' => 'Компания',
            'manager_id' => 'Менеджер',
            'phone' => 'Телефон',
            'status' => 'Статус',
            'comments' => 'Комменты админа',
            'course_id' => 'Курс',
            'date' => 'Дата',
            'is_active' => 'Активирован',
        );
        $this->ckeditor = array('comments');
        $this->cnt_per_page = 50;
        $this->table_rus = 'Заявки';
        $this->new_type = $this->new_type +
                array(
                    'rights' => array('type' => 'select', 'lists' => 'rights'),
                    'course_id' => array('type' => 'select', 'lists' => 'courses'),
                     'manager_id' => array('type' => 'select', 'lists' => 'managers'),
                     'status' => array('type' => 'select', 'lists' => 'status'),
                    
        );
    }

}
