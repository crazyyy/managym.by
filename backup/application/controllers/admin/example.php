<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('main.php');

class Example extends Main {

    function __construct() {
        parent::__construct();
        $this->initialize();
    }

    function initialize() {
        //Получаем таблицу по названию класса
        $this->table = strtolower(get_class());

        //Получаем все поля, которые есть в таблице, с информацией о них
        $this->fields = $this->database->get_fields($this->table);

        //Задаем правила валидации
        //required Возвращает FALSE если поле не заполнено	 
        //matches Возвращает FALSE если элемент не соответствует значению другого элемента	matches[form_item]
        //min_length Возвращает FALSE если значение короче указанного	min_length[6]
        //max_length Возвращает FALSE если длина больше указанной	max_length[12]
        //exact_length Возвращает FALSE если длина не равна заданной	exact_length[8]
        //alpha Возвращает FALSE если элемент содержит не только буквы	 
        //alpha_numeric Возвращает FALSE если элемент содержит не только буквы и цифры	 
        //alpha_dash Возвращает FALSE если элемент содержит не только буквы и знаки препинания.	 
        //numeric Возвращает FALSE если значение не числового вида	 
        //integer Возвращает FALSE если значение не является целым числом	 
        //is_natural Возвращает FALSE, если элемент формы содержит что-нибудь, кроме натуральных чисел 0, 1, 2, 3 и т.д.	 
        //is_natural_no_zero Возвращает FALSE, если элемент формы содержит что-нибудь, кроме натуральных чисел, кроме ноля 1, 2, 3, 4 и т.д.
        //valid_email Возвращает FALSE если значения не является корректным e-mail адресом	 
        //valid_emails Возвращает FALSE, если элемент формы не содержит списка правильных адресов электронной почты, разделенных запятыми
        //valid_ip Возвращает FALSE если IP-адрес не является действительным.	 
        //valid_base64 Возвращает FALSE если строка не является base-64 шифром
        //xss_clean Проводит фильтр на XSS-уязвимость, используемый в классе Input
        //prep_for_form Конвертирует HTML-элементы в их альтернативное значение для отображения
        //prep_url Добавляет "http://" к URL при надобности
        //strip_image_tags Извлекает URL из ссылки на картинку
        //encode_php_tags Конвертирует теги php в текст
        $this->rules = array(
            'title' => 'required',
            'email' => 'valid_email'
        );

        //Задаем русские названия полей
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

        //Указываем поля, для которых выводить ckeditor (только для полей BLOB)
        $this->ckeditor = array('description');

        //Указываем количество элементов, выводимых на странице (по умолчанию 0 = выводить все)
        $this->cnt_per_page = 5;

        //Указываем русское название раздела в админке
        $this->table_rus = 'Объявления';

        //Добавляем пользовательские типы полей, или же переопределяем старые
        //'type' => 'select', 'lists' => 'subcategories' - вывод селектов, вместо ID
        //'image' => array('type' => 'image', 'size' => array(array('height' => 600, 'width' => 800), array('height' => 100, 'width' => 200, 'prefix' => 'preview_'), array('height' => 60, 'width' => 60, 'prefix' => 'preview_mini_'))) - вывод функционала галереи
        //'c_id' => array('type' => 'id') - точный поиск по ID при фильтрации, а не LIKE %%
        $this->new_type = $this->new_type +
                array(
                    's_id' => array('type' => 'select', 'lists' => 'subcategories'),
                    'user_id' => array('type' => 'select', 'lists' => 'users'),
                    'image' => array('type' => 'image', 'size' => array(array('height' => 600, 'width' => 800), array('height' => 100, 'width' => 200, 'prefix' => 'preview_'), array('height' => 60, 'width' => 60, 'prefix' => 'preview_mini_')))
        );
        
        //Добавляет в конце страницы строку с суммой по указанным столбцам
        $this->field_sum = array('cost', 'cost_2');
        //Добавляем быстрый переход на фильтр таблицы <table> по полю <c_id> со значением <id> текущей таблицы
        $this->filter = array('name' => array('table' => 'subcategories', 'field' => 'c_id', 'value' => 'id'));
    }

}
