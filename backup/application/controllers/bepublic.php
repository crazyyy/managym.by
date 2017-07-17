<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bepublic extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database', TRUE);
    }

    function index() {

        $data = array();
		$meta = $this->database->get_metatags_by_page('/bepublic');
        $data = array(
            'title' => $meta['title'],
            'description' => $meta['description'],
            'keywords' => $meta['keywords'],
);
        $this->load->view('bepublic.tpl.php', $data);
    }

    function make_order() {
        if (count($_POST) > 0) {
            $phone = mysql_real_escape_string($_POST['phone']);
            $email = mysql_real_escape_string($_POST['email']);
            $adm_email = 'mail@managym.by';
            $company = '';
            $name = mysql_real_escape_string($_POST['name']);
            $already = $this->db->query("SELECT * FROM rasti_orders WHERE `email`='$email' AND course_id=" . $_POST['course_id']);
            if ($already->num_rows() > 0) {
                echo('1');
            } else {
                $res = $this->db->insert('rasti_orders', array('name' => $name, 'email' => $email, 'company' => $company, 'phone' => $phone, 'course_id' => $_POST['course_id'], 'date' => time()));
				
				$s_data = array();
					$s_data['email'] = $email;
					$s_data['first_name'] = $name;
					//$s_data['phone'];
					$url = "http://api.smartresponder.ru/subscribers.html?action=create&delivery_id=584642&email=$email&api_key=oXQifLudxVUCjF1sLys8SrdSlK4DIftx";
					$this->database->curlRequest($url);
					$msg = "Тема Новая заявка на курс ".$this->database->get_field('rasti_courses',$_POST['course_id'],'name')."<br>
					Данные введённые в форме:<br/>
					Имя пользователя: $name<br/>
					Email: $email<br/>
					Телефон: $phone<br/>";
					
					$this->database->send_mail($adm_email,$this->database->get_field('rasti_courses',$_POST['course_id'],'name'), $msg);
					//$adm_email = $this->database->get_field('rasti_emails',$_POST['course_id'],'email','course_id');
					//$this->database->send_mail($adm_email,$this->database->get_field('rasti_courses',$_POST['course_id'],'name'), $msg);	
					
					$em = $this->db->query("SELECT * FROM rasti_emails WHERE is_active=1 AND course_id=".$_POST['course_id']);
					if($em->num_rows()>0){
						foreach($em->result_array() as $e){
							$this->database->send_mail($e['email'],$this->database->get_field('rasti_courses',$_POST['course_id'],'name'), $msg);	
						}
					}
                echo('2');
            }
        }
    }

}
