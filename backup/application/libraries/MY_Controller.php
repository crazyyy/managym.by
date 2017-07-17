<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database', TRUE);
        /* if (!$this->session->userdata('admin'))
          if ($this->session->userdata('logged_in'))
          redirect('/');
          else
          redirect('/admin/auth'); */
        $this->initialize();
    }

    function initialize() {
        $this->table = strtolower(get_class());
        $this->fields = $this->database->get_fields($this->table);
        $this->rules = array(
            'id' => 'trim|xss_clean',
            'login' => 'trim|required|xss_clean',
            'pass' => 'trim|required|xss_clean',
            'name' => 'trim|required|xss_clean',
            'region' => 'trim|xss_clean',
            'city' => 'trim|xss_clean',
            'address' => 'trim|xss_clean',
            'phone' => 'trim|xss_clean',
            'icq' => 'trim|xss_clean',
            'skype' => 'trim|xss_clean',
            'notes' => 'trim|xss_clean',
            'rights' => 'trim|xss_clean',
            'is_active' => 'trim|xss_clean',
            'code_activate' => 'trim|xss_clean',
            'rhash' => 'trim|xss_clean',
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
            'rhash' => 'Хэш'
        );
    }

    function index() {
        redirect('/admin/' . $this->table . '/table');
    }

    function table($sort='id', $order='asc') {
        //var_dump($_POST); die();
        $error = FALSE;
        $edit = FALSE;
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            unset($_POST['action']);

            $this->load->library('form_validation');
            foreach ($_POST as $k => $f)
                $this->form_validation->set_rules($k, $this->fields_rus[$k], $this->rules[$k]);
            $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>');

            if ($this->form_validation->run() == FALSE) {
                $error = TRUE;
                if ($action == 'edit')
                    $edit = TRUE;
            } else {
                if (isset($_POST['pass']))
                    if (!isset($_POST['id']) || isset($_POST['id']) && $_POST['pass'] != $this->database->get_field($this->table, $_POST['id'], 'pass'))
                        $_POST['pass'] = md5($_POST['pass']);

                $this->database->update($this->table, array('id' => (int) $_POST['id']), $_POST);
            }
        }
        $data = array(
            'table' => $this->table,
            'fields' => $this->fields,
            'rows' => $this->database->get_rows($this->table, $sort, $order),
            'sort' => $sort,
            'order' => $order,
            'error' => $error,
            'fields_rus' => $this->fields_rus,
            'edit' => $edit,
            'actions' => $this->database->get_actions()
        );
        $data_main['template'] = $this->load->view('/admin/table.tpl.php', $data, TRUE);
        $this->load->view('/admin/main.tpl.php', $data_main);
    }

    function edit($id) {
        $data = array(
            'r' => $this->database->get_row($this->table, $id),
            'fields' => $this->fields,
            'fields_rus' => $this->fields_rus
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
        redirect('/admin/' . $this->table . '/table');
    }

}
