<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    // По умолчанию опеределяются типы полей INT (маленький инпут), STRING (средний инпут), BLOB (текстареа)
    // Если надо указать специфические поля, то передаются в этом массиве
    public $new_type = array(
        // Определяет любые ID, для того, чтобы при поиске можно было искать точное совпадение
        'id' => array('type' => 'id'),
        // Генерирует в модели списки для данных типов полей, чтобы отображались селекты
        'is_active' => array('type' => 'select', 'lists' => 'active'),
        // Эти поля отображаются как даты ДД.ММ.ГГГГ
        'date' => array('type' => 'date'),
        // Эти поля отображаются как картинки: size => [0] array(высота, ширина) - главная, [1] array(высота, ширина, префикс) [,[*] array(высота, ширина, префикс)]
        'image' => array('type' => 'image', 'size' => array(array('height' => 600, 'width' => 800), array('height' => 120, 'width' => 160, 'prefix' => 'preview_'), array('height' => 60, 'width' => 60, 'prefix' => 'preview_mini_')))
    );
    public $field_sum = array();
    public $ckeditor = array();
    public $cnt_per_page = 0;
    public $filter = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database', TRUE);
        if (!$this->session->userdata('admin') || !$this->database->show_section())
            if ($this->session->userdata('logged_in'))
                redirect('/admin/index');
            else
                redirect('/admin/auth');
        $this->initialize();
        session_start();
    }

    function index() {
        redirect('/admin/' . $this->table . '/table');
    }

    function table($sort='id', $order='asc', $cur=0) {
        $error = FALSE;
        $edit = FALSE;
        if (!isset($_SESSION[$this->table]['filter_where']))
            $where = 'id = id';
        else
            $where = $_SESSION[$this->table]['filter_where'];
        if (!isset($_SESSION[$this->table]['filter_array']))
            $search = array();
        else
            $search = $_SESSION[$this->table]['filter_array'];

        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            unset($_POST['action']);

            if (!in_array($action, array('search', 'clear'))) {
                if (isset($_POST['seo'])) {
                    $seo = $_POST['seo'];
                    unset($_POST['seo']);
                }
                if (isset($_POST['imgfile'])) {
                    unset($_POST['imgfile']);
                }

                $this->load->library('form_validation');
                foreach ($_POST as $k => $f)
                    $this->form_validation->set_rules($k, $this->fields_rus[$k], (isset($this->rules[$k]) ? $this->rules[$k] . '|trim|xss_clean' : 'trim|xss_clean'));
                $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>');

                $this->form_validation->set_message('valid_email', 'В поле %s некорректный e-mail');
                $this->form_validation->set_message('required', 'Поле %s обязательно при заполнении');
                $this->form_validation->set_message('max_length', 'Значение поля %s превысило возможную длину');
                $this->form_validation->set_message('min_length', 'Значение поля %s меньше необходимой длины');
                $this->form_validation->set_message('matches', 'Значение поля %s не совпадает со значением поля %s');

                if ($this->form_validation->run() == FALSE) {
                    $error = TRUE;
                    if ($action == 'edit')
                        $edit = TRUE;
                } else {
                    $vals = $this->database->check_fields($_POST, $action);
                    $res = $this->database->update($this->table, array('id' => $vals['id']), $vals);

                    if (isset($seo)) {
                        $seo['table'] = $this->table;
                        $seo['item_id'] = $action == 'edit' ? $vals['id'] : $res;
                        $this->database->update('seo', array('table' => $seo['table'], 'item_id' => $seo['item_id']), $seo);
                    }
                }
            } elseif ($action == 'search') {
                $search = $_POST;
                $_SESSION[$this->table]['filter_array'] = $search;
                if (isset($_SESSION[$this->table]['filter_where'])) {
                    unset($_SESSION[$this->table]['filter_where']);
                    $where = 'id = id';
                }
                $vals = $this->database->check_fields($_POST, $action);
                foreach ($this->fields as $f) {
                    if (!isset($this->new_type[$f->name]) && strlen($vals[$f->name]) > 0)
                        $where .= ' AND ' . $f->name . ' LIKE "%' . $vals[$f->name] . '%"';
                    elseif (isset($this->new_type[$f->name]) && $this->new_type[$f->name]['type'] == 'date' && ($vals[$f->name . '_from'] != NULL || $vals[$f->name . '_to'] != NULL)) {
                        if ($vals[$f->name . '_from'] != NULL)
                            $where .= ' AND ' . $f->name . ' >= ' . $vals[$f->name . '_from'];
                        if ($vals[$f->name . '_to'] != NULL)
                            $where .= ' AND ' . $f->name . ' <= ' . $vals[$f->name . '_to'];
                    }
                    elseif (isset($this->new_type[$f->name]) && ($this->new_type[$f->name]['type'] == 'select' && $vals[$f->name] != -1
                            || $this->new_type[$f->name]['type'] == 'id' && $vals[$f->name] > 0))
                        $where .= ' AND ' . $f->name . ' = ' . $vals[$f->name];
                }
                $_SESSION[$this->table]['filter_where'] = $where;
            } elseif ($action == 'clear') {
                unset($_SESSION[$this->table]['filter_where']);
                unset($_SESSION[$this->table]['filter_array']);
                redirect('/admin/' . $this->table . '/table');
            }
        }

        if ($this->cnt_per_page > 0) {
            $this->load->library('pagination');
            $config = array(
                'base_url' => '/admin/' . $this->table . '/' . __FUNCTION__ . '/' . $sort . '/' . $order,
                'total_rows' => count($this->database->get_rows($this->table, $where)),
                'per_page' => $this->cnt_per_page,
                'num_links' => 4,
                'first_link' => '1',
                'last_link' => ceil(count($this->database->get_rows($this->table, $where)) / $this->cnt_per_page),
                'uri_segment' => 6,
                'full_tag_open' => '<ul>',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '</span></li>',
                'next_link' => '»',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_link' => '«',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_link' => FALSE,
                'last_link' => FALSE
            );
            $this->pagination->initialize($config);
            $page_links = $this->pagination->create_links();
        } else {
            $page_links = false;
        }

        if (count($this->field_sum) > 0)
            foreach ($this->field_sum as $v) {
                $this->field_sum[$v] = $this->database->get_sum_field($this->table, $v, $where);
            }

        $data = array(
            'table' => $this->table,
            'fields' => $this->fields,
            'rows' => $this->database->get_rows($this->table, $where, $sort, $order, $cur, $this->cnt_per_page),
            'sort' => $sort,
            'order' => $order,
            'error' => $error,
            'fields_rus' => $this->fields_rus,
            'edit' => $edit,
            'lists' => $this->database->get_lists(),
            'ckeditor' => $this->ckeditor,
            'page_links' => $page_links,
            'table_rus' => $this->table_rus,
            'new_type' => $this->new_type,
            'field_sum' => $this->field_sum,
            'filter' => $this->filter,
            'search' => $search
        );
        $data_main['template'] = $this->load->view('/admin/table.tpl.php', $data, TRUE);
        $this->load->view('/admin/main.tpl.php', $data_main);
    }

    function filter($field, $value) {
        $where = 'id = id';
        if (isset($_SESSION[$this->table]['filter_where']))
            unset($_SESSION[$this->table]['filter_where']);
        $_SESSION[$this->table]['filter_array'] = array($field => $value);
        $vals[$field] = urldecode($value);
        if (!isset($this->new_type[$field]) && strlen($vals[$field]) > 0)
            $where .= ' AND ' . $field . ' LIKE "%' . $vals[$field] . '%"';
        elseif (isset($this->new_type[$field]) && $this->new_type[$field]['type'] == 'date' && ($vals[$field . '_from'] != NULL || $vals[$field . '_to'] != NULL)) {
            if ($vals[$field . '_from'] != NULL)
                $where .= ' AND ' . $field . ' >= ' . $vals[$field . '_from'];
            if ($vals[$field . '_to'] != NULL)
                $where .= ' AND ' . $field . ' <= ' . $vals[$field . '_to'];
        }
        elseif (isset($this->new_type[$field]) && ($this->new_type[$field]['type'] == 'select' && $vals[$field] != -1
                || $this->new_type[$field]['type'] == 'id' && $vals[$field] > 0))
            $where .= ' AND ' . $field . ' = ' . $vals[$field];
        $_SESSION[$this->table]['filter_where'] = $where;
        redirect('/admin/' . $this->table . '/table');
    }

    function edit($id) {
        $data = array(
            'r' => $this->database->get_row($this->table, $id),
            'fields' => $this->fields,
            'fields_rus' => $this->fields_rus,
            'lists' => $this->database->get_lists(),
            'ckeditor' => $this->ckeditor,
            'table' => $this->table,
            'new_type' => $this->new_type
        );
        $this->load->view('/admin/table_row.tpl.php', $data);
    }

    function delete($id) {
        $this->database->delete_row($this->table, $id);
        echo NULL;
    }

    function actions() {
        if (!isset($_POST['actions']))
            redirect('/admin/' . $this->table . '/table');

        switch ($_POST['actions']) {
            case 1:
                foreach ($_POST['id'] as $id)
                    $this->database->delete_row($this->table, $id);
                break;
            case 2:
                foreach ($_POST['id'] as $id)
                    $this->database->update($this->table, array('id' => $id), array('is_active' => 1));
                break;
            case 3:
                foreach ($_POST['id'] as $id)
                    $this->database->update($this->table, array('id' => $id), array('is_active' => 0));
                break;
        }
        if (isset($_SERVER['HTTP_REFERER']))
            redirect($_SERVER['HTTP_REFERER']);
        else
            redirect('/admin/' . $this->table . '/table');
    }

    function upload_image() {
        header('Cache-Control: no-store, no-cache');
        header('Content-Type: text/html; charset=utf-8');

        if (isset($_FILES['imgfile']['tmp_name']) && isset($this->new_type[$_POST['field']])) {
            $id = intval($_POST['id']);
            $img_name = $this->uri->segment(2) . '_' . $_POST['field'] . '_' . time();

            foreach ($this->new_type[$_POST['field']]['size'] as $k => $size) {
                if ($k == 0)
                    $image = $this->database->insert_image($_FILES['imgfile']['tmp_name'], 'views/content', '', $img_name, $size['width'], $size['height'], 'cut');
                else
                    $this->database->insert_image($_FILES['imgfile']['tmp_name'], 'views/content', '', $size['prefix'] . $img_name, $size['width'], $size['height'], 'cut');
            }
            if ($image != false) {
                echo $image;
            } else {
                echo 'no_preview.png';
            }
        } else {
            echo 'no_preview.png';
        }
    }

}
