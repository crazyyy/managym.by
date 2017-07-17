<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Rasti_managers extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
             'name' => 'required'
            
             
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'name'=>'Имя менеджера',
            'is_active'=>'Активирован',
            'date'=>'Дата'
            
          
        );
        
        $this->cnt_per_page = 10;
        $this->table_rus = 'Менеджеры';
        
       
    }

}

