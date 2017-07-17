<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_companies extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
             'name' => 'required',
             'photo' => 'required'
             
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name'=>'Имя компании',
            'photo' => 'Аватар',
            'photo_active' => 'Аватар активный',
            'is_active'=>'Активирован',
            'date'=>'Дата'
            
          
        );
        
        $this->cnt_per_page = 10;
        $this->table_rus = 'Компании';
        $this->new_type = $this->new_type +
                array(
                    
                    'photo' => array('type' => 'image', 'size' => array(array('height' =>107, 'width' => 0), array('height' => 60, 'width' => 60, 'prefix' => 'preview_'))),
                    'photo_active' => array('type' => 'image', 'size' => array(array('height' =>107, 'width' => 0), array('height' => 60, 'width' => 60, 'prefix' => 'preview_')))
        );
            
       
    }

}


