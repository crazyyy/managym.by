<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_company_comments extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
             'company_id' => 'required',
             'descr' => 'required',
             'descr_full' => 'required',
            
             
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'company_id'=>'Название компании',
            'descr'=>'Описание компании',
            'descr_full'=>'Отзыв компании',
            'is_active'=>'Активирован',
            'date'=>'Дата'
               
        );
         $this->ckeditor = array('descr_full');
        $this->cnt_per_page = 10;
        $this->table_rus = 'Отзывы компаний';
        $this->new_type = $this->new_type +
                array(
                    'company_id' => array('type' => 'select', 'lists' => 'companies')
                   
        );
        
             //Добавляем быстрый переход на фильтр таблицы <table> по полю <c_id> со значением <id> текущей таблицы
        $this->filter = array('company_id' => array('table' => 'rasti_companies', 'field' => 'id', 'value' => 'company_id'));
       
    }

}

