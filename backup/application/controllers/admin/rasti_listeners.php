<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_listeners extends Main {

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
             'email' => 'required',
             'company' => 'required',
             'poste' => 'required',
             'course_id' => 'required',
             
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name'=>'Имя слушателя',
            'phone'=>'Телефон',
            'email'=>'Электронный адрес',
            'company'=>'Компания',
            'poste'=>'Должность',
            'photo' => 'Аватар',
            'course_id'=>'Курс',
            'is_active'=>'Активирован',
            'date'=>'Дата'
            
          
        );
        
        $this->cnt_per_page = 10;
        $this->table_rus = 'Слушатели';
        $this->new_type = $this->new_type +
                array(
                    'course_id' => array('type' => 'select', 'lists' => 'courses'),
                    'photo' => array('type' => 'image', 'size' => array(array('height' =>0, 'width' => 0), array('height' => 60, 'width' => 60, 'prefix' => 'preview_')))
        );
             //Добавляем быстрый переход на фильтр таблицы <table> по полю <c_id> со значением <id> текущей таблицы
        $this->filter = array('course_id' => array('table' => 'rasti_courses', 'field' => 'id', 'value' => 'course_id'));
       
    }

}

