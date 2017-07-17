<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_courses extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
             'name' => 'required',
             'position' => 'required',
             'teacher' => 'required',
             'url' => 'required',
             'photo' => 'required',
             'category_id' => 'required',
             'text1' => 'required',
             'text2' => 'required',
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name'=>'Название курса',
            'position'=>'Порядок курса',
            'teacher'=>'ФИО преподавателя',
            'descr'=>'Описание',
            'url'=>'Урл курса',
            'photo' => 'Аватар',
            'category_id'=>'Категория',
            'text1'=>'',
            'text2'=>'',
            'is_active'=>'Активирован',
            'date'=>'Дата'
        );
        $this->ckeditor = array('descr');
        $this->cnt_per_page = 10;
        $this->table_rus = 'Тренинги';
        $this->new_type = $this->new_type +
                array(
                    'category_id' => array('type' => 'select', 'lists' => 'categories'),
                    'photo' => array('type' => 'image', 'size' => array(array('height' =>0, 'width' => 0), array('height' => 272, 'width' => 272, 'prefix' => 'preview_')))
        );
       
    }

}

