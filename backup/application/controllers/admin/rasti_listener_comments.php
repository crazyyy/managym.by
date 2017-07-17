<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_listener_comments extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
             'listener_id' => 'required',
             'descr' => 'required',
             'descr_full' => 'required',
            
             
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'listener_id'=>'Имя слушателя',
            'descr'=>'Описание слушателя',
            'descr_full'=>'Отзыв слушателя',
            'is_active'=>'Активирован',
            'date'=>'Дата'
               
        );
         $this->ckeditor = array('descr_full');
        $this->cnt_per_page = 10;
        $this->table_rus = 'Отзывы слушателей';
        $this->new_type = $this->new_type +
                array(
                    'listener_id' => array('type' => 'select', 'lists' => 'listeners')                   
        );
        
             //Добавляем быстрый переход на фильтр таблицы <table> по полю <c_id> со значением <id> текущей таблицы
        $this->filter = array('listener_id' => array('table' => 'rasti_listeners', 'field' => 'id', 'value' => 'listener_id'));
       
    }

}

