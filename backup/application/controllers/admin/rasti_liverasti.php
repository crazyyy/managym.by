<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_liverasti extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
             'name' => 'required',
            
             'descr' => 'required',
             'url' => 'required',
             'photo' => 'required',
            
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name'=>'Название новости',
           
            'descr'=>'Краткое описание',
            'url'=>'Полный урл на новость',
            'photo' => 'Картинка',
            'is_active'=>'Активирован',
            'date'=>'Дата'
        );
       
        $this->cnt_per_page = 10;
        $this->table_rus = 'LIVE.RASTI';
        $this->new_type = $this->new_type +
                array(
                    'photo' => array('type' => 'image', 'size' => array(array('height' =>96, 'width' => 208), array('height' => 50, 'width' => 50, 'prefix' => 'preview_'))),
        );
       
    }

}

