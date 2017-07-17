<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Ads extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'title' => 'required',
            'email' => 'valid_email'
        );
        $this->fields_rus = array(
            'id' => 'ID',
            'title' => 'Заголовок',
            's_id' => 'Подкатегория',
            'description' => 'Описание',
            'cost' => 'Стоимость',
            'email' => 'E-mail',
            'user_id' => 'Пользователь',
            'views' => 'Просмотров',
            'date' => 'Дата',
            'image' => 'Картинка'
        );
        $this->ckeditor = array('description');
        $this->table_rus = 'Объявления';
        $this->new_type = $this->new_type +
                array(
                    's_id' => array('type' => 'select', 'lists' => 'subcategories'),
                    'user_id' => array('type' => 'select', 'lists' => 'users'),
                    'image' => array('type' => 'image', 'size' => array(array('height' => 600, 'width' => 800), array('height' => 100, 'width' => 200, 'prefix' => 'preview_'), array('height' => 60, 'width' => 60, 'prefix' => 'preview_mini_')))
        );
    }

}
