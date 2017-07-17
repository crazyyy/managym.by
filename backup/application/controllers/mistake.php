<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mistake extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Database_model', 'database', TRUE);
    }

    function index() {

        $data = array();
		$meta = $this->database->get_metatags_by_page('/mistake');
        $data = array(
            'title' => $meta['title'],
            'description' => $meta['description'],
            'keywords' => $meta['keywords'],
			);
        $this->load->view('mistake.tpl.php', $data);
    }

	function mistake1(){
		$this->load->view('mistake/mistake1.tpl.php');
	}

	function mistake2(){
		$this->load->view('mistake/mistake2.tpl.php');
	}
	
	function mistake3(){
		$this->load->view('mistake/mistake3.tpl.php');
	}

	function mistake4(){
		$this->load->view('mistake/mistake4.tpl.php');
	}
	
	function mistake5(){
		$this->load->view('mistake/mistake5.tpl.php');
	}

	function sertificate(){
		$this->load->view('mistake/sertificate.tpl.php');
	}
	
    function make_order() {
        if (count($_POST) > 0) {
            $phone = mysql_real_escape_string($_POST['phone']);
            $email = mysql_real_escape_string($_POST['email']);
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
					$msg = "Новая заявка на курс ".$this->database->get_field('rasti_courses',$_POST['course_id'],'name')."<br>
					Данные введённые в форме:<br/>
					Имя пользователя: $name<br/>
					Email: $email<br/>
					Телефон: $phone<br/><br/>
					<a href=\"http://managym.by/mistake/mistake1/\">Ссылка на видео</a>";
					
					$this->database->send_mail($email,$this->database->get_field('rasti_courses',$_POST['course_id'],'name'), $msg);
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

	function video(){
        if (count($_POST) > 0) {
            $phone = mysql_real_escape_string($_POST['phone']);
            $email = mysql_real_escape_string($_POST['email']);
            $name = mysql_real_escape_string($_POST['name']);

			$url = "http://api.smartresponder.ru/subscribers.html?action=create&delivery_id=584642&email=$email&api_key=oXQifLudxVUCjF1sLys8SrdSlK4DIftx";
			$this->database->curlRequest($url);
					
			$msg = "Новая заявка на видео курсы <br>
					Данные введённые в форме:<br/>
					Имя пользователя: $name<br/>
					Email: $email<br/>
					Телефон: $phone<br/>
					<a href=\"http://managym.by/mistake/mistake1/\">Ссылка на видео</a>";
					
			$this->database->send_mail($email,'Видео курсы', $msg);
					
					
			$em = $this->db->query("SELECT * FROM rasti_emails_club");
			if($em->num_rows()>0){
				foreach($em->result_array() as $e){
					$this->database->send_mail($e['email'],"Видео курсы", $msg);	
				}
			}

           echo('1');
        }
	}

	function sert(){
        if (count($_POST) > 0) {
            $phone = mysql_real_escape_string($_POST['phone']);
            $email = mysql_real_escape_string($_POST['email']);
            $name = mysql_real_escape_string($_POST['name']);
            $adm_email = 'mail@managym.by';

			$url = "http://api.smartresponder.ru/subscribers.html?action=create&delivery_id=584642&email=$email&api_key=oXQifLudxVUCjF1sLys8SrdSlK4DIftx";
			$this->database->curlRequest($url);
					
			$msg = "Новая заявка на сертификат <br>
					Данные введённые в форме:<br/>
					Имя пользователя: $name<br/>
					Email: $email<br/>
					Телефон: $phone<br/>";
					
			$this->database->send_mail($adm_email,'Запрос на сертификат', $msg);
					
					
			$em = $this->db->query("SELECT * FROM rasti_emails_club");
			if($em->num_rows()>0){
				foreach($em->result_array() as $e){
					$this->database->send_mail($e['email'],"Запрос на сертификат", $msg);	
				}
			}
			echo('1');
        }
	}
	

}
