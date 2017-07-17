<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_orders_club extends Main {

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
            'work' => 'required',
            'email' => 'required',
            'number' => 'required',
            'dbirth' => 'required',
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'work' => 'Место работ',
            'manager_id' => 'Менеджер',
            'phone' => 'Телефон',
            'status' => 'Статус',
            'comments' => 'Комменты админа',
            'number' => 'Карта',
            'dbirth' => 'Дата рождения',
            'vyp' => 'Выпускник?',
            'dru' => 'Друг?',
            'get' => 'Получить карту?',
            'ras' => 'Рассылка?',
            'date' => 'Дата',
            'is_active' => 'Активирован',
        );
        $this->ckeditor = array('comments');
        $this->cnt_per_page = 50;
        $this->table_rus = 'Заявки(клуб)';
        $this->new_type = $this->new_type +
                array(
                    'manager_id' => array('type' => 'select', 'lists' => 'managers'),
                    'status' => array('type' => 'select', 'lists' => 'status'),
                    'vyp' => array('type' => 'select', 'lists' => 'active'),
                    'dru' => array('type' => 'select', 'lists' => 'active'),
                    'get' => array('type' => 'select', 'lists' => 'active'),
                    'ras' => array('type' => 'select', 'lists' => 'active'),
        );
    }

}
