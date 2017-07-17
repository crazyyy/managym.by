<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Database_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_lists() {
        $lists = array(
            'sections' => array('index' => 'Главная', 'users' => 'Пользователи','rasti_courses'=>'Курсы','rasti_listeners'=>'Слушатели'),
            'actions' => array('', 'Удалить', 'Активировать', 'Деактивировать'),
            'active' => array('Нет', 'Да'),
            'rights' => array('Пользователь', 'Модератор', '777' => 'Администратор'),
            'categories' => $this->get_list('categories', 'name', 'name'),
            'subcategories' => $this->get_list('subcategories', 'name', 'name'),
            'users' => $this->get_list('users', 'name', 'name'),
            'categories' => $this->get_list('rasti_course_categories', 'name'),
            'courses' => $this->get_list('rasti_courses', 'name')
        );
        return $lists;
    }

    function show_section($section=NULL) {
        if ($section == NULL)
            $section = $this->uri->segment(2);

        $list = array(
            'users' => array('777')
        );

        if (isset($list[$section])) {
            if (in_array($this->get_rights(), $list[$section])) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    function get_rights() {
        if (!$this->session->userdata('logged_in'))
            return false;
        else
            return $this->get_field('users', $this->session->userdata('user_id'), 'rights');
    }

    function check_fields($vals, $action) {
        if (isset($vals['id']))
            $vals['id'] = intval($vals['id']);

        if (isset($vals['pass']))
            if ($action != 'search' && (!isset($vals['id']) || isset($vals['id']) && $vals['pass'] != $this->database->get_field($this->table, $vals['id'], 'pass')))
                $vals['pass'] = md5($vals['pass']);

        if (isset($vals['date'])) {
            if ($vals['date'] == NULL) {
                $vals['date'] = time();
            } else {
                $date_tmp = explode('.', $vals['date']);
                $vals['date'] = mktime(0, 0, 0, $date_tmp[1], $date_tmp[0], $date_tmp[2]);
            }
        }

        if (isset($vals['date_from'])) {
            if ($vals['date_from'] == NULL) {
                if ($action != 'search')
                    $vals['date_from'] = mktime(0, 0, 0, $date("m"), $date("d"), $date("Y"));
            }
            else {
                $date_tmp = explode('.', $vals['date_from']);
                $vals['date_from'] = mktime(0, 0, 0, $date_tmp[1], $date_tmp[0], $date_tmp[2]);
            }
        }

        if (isset($vals['date_to'])) {
            if ($vals['date_to'] == NULL) {
                if ($action != 'search')
                    $vals['date_to'] = mktime(0, 0, 0, $date("m"), $date("d"), $date("Y"));
            }
            else {
                $date_tmp = explode('.', $vals['date_to']);
                $vals['date_to'] = mktime(0, 0, 0, $date_tmp[1], $date_tmp[0], $date_tmp[2]);
            }
        }

        return $vals;
    }

    function get_list($table, $field, $order=NULL, $with_null=0, $where=NULL) {
        $sql = "SELECT * FROM " . $table;
        if ($where != NULL)
            $sql .= " WHERE " . $where;
        if ($order != NULL)
            $sql .= " ORDER BY " . $order;
        $query = $this->db->query($sql);
        $list = array();
        if ($with_null == 1)
            $list[0] = 'Выбрать';
        foreach ($query->result_array() as $row)
            $list[$row['id']] = $row[$field];
        return $list;
    }

    function get_fields($table) {
        $res = $this->db->field_data($table);
        return $res;
    }

    function get_rows($table, $where, $sort='id', $order='asc', $limit_from=0, $limit_cnt=0) {
        if ($limit_cnt != 0 || $limit_from != 0)
            $q = $this->db->order_by($sort, $order)->get_where($table, $where, $limit_cnt, $limit_from);
        else
            $q = $this->db->order_by($sort, $order)->get_where($table, $where);
        return $q->result_array();
    }

    function delete_row($table, $id) {
        $this->db->delete($table, array('id' => $id));
    }

    function add_row($table, $vals) {
        $this->db->insert($table, $vals);
    }

    function get_row($table, $id) {
        $query = $this->db->get_where($table, array('id' => $id));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else {
            return false;
        }
    }

    function get_field($table, $id, $attr, $field='id') {
        $query = $this->db->get_where($table, array($field => $id));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            if (isset($row[$attr]))
                return $row[$attr];
            else
                return false;
        } else {
            return false;
        }
    }

    function update($table, $params, $vals) {
        $query = $this->db->get_where($table, $params);
        if ($query->num_rows() > 0) {
            $this->db->update($table, $vals, $params);
            return true;
        } else {
            $this->db->insert($table, $vals);
            return $this->db->insert_id();
        }
    }

    function send_mail($to, $subject, $msg) {
        try {
            $this->load->library('email');
            $config = array(
                'mailtype' => 'html'
            );
            $this->email->initialize($config);
            $this->email->from('info@osip.by', 'info@osip.by');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($msg);
            $this->email->send();
            //$this->email->print_debugger();
        } catch (Exception $e) {
            
        }
    }

    function get_metatags($table, $item_id) {
        $q = $this->db->get_where('seo', array('table' => $table, 'item_id' => $item_id));
        if ($q->num_rows() > 0)
            return $q->row_array();
        else
            return array('title' => '', 'description' => '', 'keywords' => '');
    }
	
	function get_metatags_by_page($url) {
        return $this->get_metatags('pages', $this->get_field('pages', $url, 'id', 'url'));
    }

    // resize_type = [''(simple_resize),'w'(resize by width), 'h'(resize by height), 'max'(resize to max container), 'min'(cut),'cut']
    // $width = 0, $height = 0, - original 
    function insert_image($temp_name, $path_main, $path_add, $entitle, $width = 0, $height = 0, $resize_type = '', $srcx = 0, $srcy = 0) {
        // create directories
        $dir_arr = explode('/', $path_add);
        $direct_temp = $_SERVER['DOCUMENT_ROOT'] . '/' . $path_main . '/';
        for ($i = 0; $i < count($dir_arr); $i++) {
            if (!is_dir($direct_temp . $dir_arr[$i])) {
                mkdir($direct_temp . $dir_arr[$i]);
            }
            $direct_temp .= $dir_arr[$i] . '/';
        }
        $size = getimagesize($temp_name);
        $type = $size['mime'];
        $new_name = 'none';
        switch ($type) {
            case 'image/jpeg':
                $new_name = $entitle . ".jpg";
                break;
            case 'image/png':
                $new_name = $entitle . ".png";
                break;
            case 'image/gif':
                $new_name = $entitle . ".gif";
                break;
        }
        if ($new_name === 'none')
            return false;
        // resize calc
        $new_width = 0;
        $new_height = 0;
        $src_width = $size[0];
        $src_height = $size[1];
        if ($width && $height) {
            if ($resize_type == '') { // simple resize
                $new_width = $width;
                $new_height = $height;
            } elseif ($resize_type == 'w') { // resize by width
                $new_width = $width;
                $new_height = $width * $size[1] / $size[0];
            } elseif ($resize_type == 'h') { // resize by height
                $new_height = $height;
                $new_width = $height * $size[0] / $size[1];
            } elseif ($resize_type == 'max') { // resize by max
                if ((1.0 * $width / $height) < (1.0 * $size[0] / $size[1])) {
                    $new_width = $width;
                    $new_height = $width * $size[1] / $size[0];
                } else {
                    $new_height = $height;
                    $new_width = $height * $size[0] / $size[1];
                }
            } elseif ($resize_type == 'min') { // cut resize
                if ((1.0 * $width / $height) > (1.0 * $size[0] / $size[1])) {
                    $new_width = $width;
                    $new_height = $width * $size[1] / $size[0];
                } else {
                    $new_height = $height;
                    $new_width = $height * $size[0] / $size[1];
                }
            } elseif ($resize_type == 'cut') {
                if ((1.0 * $width / $height) > (1.0 * $size[0] / $size[1])) {
                    $src_width = $size[0];
                    $src_height = intval($src_width * $height / $width);
                    $new_width = $width;
                    $new_height = $height;
                } else {
                    $src_height = $size[1];
                    $src_width = intval($src_height * $width / $height);
                    $new_width = $width;
                    $new_height = $height;
                }
            }
        } else {
            if (!copy($temp_name, $direct_temp . $new_name))
                return '';
            return $path_add . $new_name;
        }

        // resizing
        switch ($type) {
            //int imagecopyresampled (
            //  resource dst_im, resource src_im, 
            //  int dstX, int dstY, int srcX, int srcY, 
            //  int dstW, int dstH, int srcW, int srcH)
            case 'image/jpeg':
                $src = imagecreatefromjpeg($temp_name);
                $dest = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($dest, $src, 0, 0, $srcx, $srcy, $new_width, $new_height, $src_width, $src_height);
                imagejpeg($dest, $direct_temp . $new_name, 75);
                imagedestroy($src);
                imagedestroy($dest);
                break;
            case 'image/png':
                $src = imagecreatefrompng($temp_name);
                $dest = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($dest, $src, 0, 0, $srcx, $srcy, $new_width, $new_height, $src_width, $src_height);
                imagepng($dest, $direct_temp . $new_name);
                imagedestroy($src);
                imagedestroy($dest);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($temp_name);
                $dest = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($dest, $src, 0, 0, $srcx, $srcy, $new_width, $new_height, $src_width, $src_height);
                imagegif($dest, $direct_temp . $new_name);
                imagedestroy($src);
                imagedestroy($dest);
                break;
        }
        chmod($direct_temp . $new_name, 0777);
        return $path_add . $new_name;
    }

    function get_sum_field($table, $field, $where) {
        $q = $this->db->query('SELECT SUM(' . $field . ') as sum FROM ' . $table . ' WHERE ' . $where);
        if ($q->num_rows > 0) {
            $row = $q->row_array();
            return $row['sum'];
        } else {
            return 0;
        }
    }
	
	function get_page_content($pos) {
        $url = '/' . $this->uri->segment(1);
        if ($this->uri->segment(2) == 'flat')
            $url .= '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3);
        elseif ($this->uri->segment(2) == 'auth')
            $url .= '/' . $this->uri->segment(2);
        elseif ($this->uri->segment(1) == 'news' && $this->uri->segment(2) == 'show_all')
            $url .= '/show_all';
        if ($rows = $this->get_rows('pages', 'url = "' . $url . '" AND content_' . $pos . ' IS NOT NULL')) {
            if (count($rows) > 0) {
                return $rows[0]['content_' . $pos];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}