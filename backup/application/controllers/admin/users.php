<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Users extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'login' => 'required',
            'pass' => 'required',
            'name' => 'required'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'login' => 'Логин',
            'pass' => 'Пароль',
            'name' => 'Имя',
            'region' => 'Регион',
            'city' => 'Город',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'icq' => 'ICQ',
            'skype' => 'Skype',
            'notes' => 'Примечание',
            'rights' => 'Права',
            'is_active' => 'Активирован',
            'code_activate' => 'Код активации',
            'rhash' => 'Хэш',
            'avatar' => 'Аватар'
        );
        $this->ckeditor = array('notes');
        $this->cnt_per_page = 4;
        $this->table_rus = 'Пользователи';
        $this->new_type = $this->new_type +
                array(
                    'rights' => array('type' => 'select', 'lists' => 'rights'),
                    'avatar' => array('type' => 'image', 'size' => array(array('height' => 400, 'width' => 200), array('height' => 200, 'width' => 100, 'prefix' => 'preview_'), array('height' => 60, 'width' => 60, 'prefix' => 'preview_mini_')))
        );
       
    }

}
