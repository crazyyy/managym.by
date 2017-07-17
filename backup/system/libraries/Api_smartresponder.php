<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_smartresponder {
    private $config;
    private $lists;
    private $error = NULL;
    private $debug = FALSE;

    function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->library('session');
        //$this->config = $config;
        //$this->lists = $config['lists'];
       // unset($config['lists']);
    }

    // Получает данные подписчика по email, может попытаться сделать это прямо из конкретного списка рассылок
    // при запросе с конкретным списком в качестве даты подписки возвращает дату подписки на этот список
    function getSubscriber($email, $list = NULL) {
    	$this->debugLog('getSubscriber start');

		$data = array(
		    'action' => 'list',
		    'search[email]' => $email,
		);

		// если задан конкретный список
		if (NULL !== $list) {
			$data['search[deliveries_ids]'] = $this->lists[$list];
		} 

		$results = $this->query('http://api.smartresponder.ru/subscribers.html', $data);

		if (FALSE !== $results) {
			if (isset($results['list']['elements'][0])) {

				/*
				[deliveries] => Array
			    (
			        [0] => Array
			            (
			                [id] => 213806
			                [date_added] => 02.11.2012 12:10:40
			            )*/

				// если указан лист подписчика - то возвращаем дату добавления именно в этот лист если возможно
				if (NULL !== $list) {
					foreach ($results['list']['elements'][0]['deliveries'] as $key => $that_list)
                        if ($this->lists[$list] == (int)$that_list['id']) {
						    $this->debugLog('add date replaced from ' . $results['list']['elements'][0]['date_added'] . ' to' . $results['list']['elements'][0]['deliveries'][$key]['date_added']);
						    $results['list']['elements'][0]['date_added'] = $results['list']['elements'][0]['deliveries'][$key]['date_added'];
					    }
				} 

				return $results['list']['elements'][0];
			}
		}
        return FALSE;
    }


    // добавление подписчика вообще или в конкретный список
    // умееет корректно работать если подписчик уже добавлен
    function addSubscriber($s_data) {
    	$this->debugLog('addSubscriber start');

    	if (FALSE !== $subscriber = $this->getSubscriber($s_data['email'], NULL)) {
    		$this->debugLog('subscriber exists:');
    		$this->debugLog($subscriber);
    		// если подписчик уже у нас есть - просто добавляем его в список рассылки
            $data = array(
                'action' => 'link_with_delivery',
                'search[email]' => $s_data['email'],
                'delivery_id' => 189896,
            );

            $results = $this->query('http://api.smartresponder.ru/subscribers.html', $data);
            $this->debugLog('Add in list result:');
            $this->debugLog($results);

			// и обновляем данные если их достаточно и запись не рид онли
			if (1 != count($s_data)) {
				if (0 == $subscriber['f_readonly']) {
					$results = $this->updateSubscriber($s_data);
					$this->debugLog('Results of updating data:');
					$this->debugLog($results);
				}
			}
			return $results;
    	} else {
    		$this->debugLog('subscriber not found');
			$data = array(
			    'action' => 'create',
			    'first_name' => ((!isset($s_data['first_name']) && isset($s_data['name'])) ? $s_data['name'] : $s_data['first_name']),
			    'email' => $s_data['email'],
                'delivery_id' => 189896
			);

			if (isset($s_data['hop'])) $data['extra_s1'] = $s_data['hop'];
			if (isset($s_data['subscribed'])) $data['extra_s2'] = $s_data['subscribed'];
			if (isset($s_data['bought'])) $data['extra_s3'] = $s_data['bought'];
			
			$results = $this->query('http://api.smartresponder.ru/subscribers.html', $data);
			$this->debugLog('Results of adding in list:');
			$this->debugLog($results);

			if (FALSE !== $results) {
				if (isset($results['id'])) {
					return $results['id'];
				}
			}
            return FALSE;
    	}
    }


    // обновлеяет данные подписчка
    // если нужно может подписать на конкретный список
    function updateSubscriber($s_data) {
    	$this->debugLog('updateSubscriber start');
        $subscriber = $this->getSubscriber($s_data['email'], NULL);
        if (FALSE !== $subscriber) {
            if (0 == $subscriber['f_readonly']) {
                $data = array(
                    'action' => 'update',
                );
                $data = array_merge($data, $s_data);

                if (isset($data['name'])) {
                    $data['first_name'] = $data['name'];
                    unset($data['name']);
                }

                unset($data['email']);
                $data['id'] = $subscriber['id'];

                $results = $this->query('http://api.smartresponder.ru/subscribers.html', $data);

                $this->debugLog('Changing subscriber data results:');
                $this->debugLog($results);

                if (FALSE !== $results) {
                    if (isset($results['id'])) {
                        return $results['id'];
                    }
                }
                return FALSE;
            }
        }
        $this->debugLog('Ignoring of changing subscriber data (subscriber not found or readonly)');
        return FALSE;
    }


    // просто исключает подписчика из выбранной рассылки но не удаляет его из общего списка
    function deleteSubscriber($email, $list) {
    	$this->debugLog('deleteSubscriber start');
		$data = array(
		    'action' => 'unlink_with_delivery',
		    'delivery_id' => 189896,
		   	'search[email]' => $email
		);

		$results = $this->query('http://api.smartresponder.ru/subscribers.html', $data);
		$this->debugLog('Results of deleting from the list:');
		$this->debugLog($results);

		return (FALSE !== $results && 1 == $results['result']);
    }

    function query($url, $data) {
    	//$data = array_merge($this->config, $data);
    	$content = http_build_query($data);
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => $content,
	           	'header' => "Connection: close\r\n".
	                        "Content-Type: application/x-www-form-urlencoded\r\n".
	                        "Content-Length: ".strlen($content)."\r\n",
				)
		);
		$context  = stream_context_create($options);
		$results = file_get_contents($url, false, $context);

		return $this->objectToArray($this->saveErrors(json_decode($results)));
    }

    function saveErrors($results) {
    	if (isset($results->error)) {
    		$this->error = $results->error->message . '(code:' . $results->error->code . ')';
    		return FALSE;
    	} else {
    		$this->error = NULL;

    		return $results;
    	}
    }

    function debugLog($text) {
        $prefix = 'smartresponder: ';
    	if (TRUE === $this->debug) { 
    		if (is_array($text)) {
    			$text = json_encode($text);
                log_message('ERROR', $prefix.$text);
    		} elseif (is_object($text)) {
    			$text = json_encode($text);
                log_message('ERROR', $prefix.$text);
    		} else {
                log_message('ERROR', $prefix.$text);
            }
    	}
    }


	// stdClass в многомерный массив
	function objectToArray($d) {
		if (is_object($d)) {
			$d = get_object_vars($d);
		}

		if (is_array($d)) {
			return array_map(array(&$this, 'objectToArray'), $d); // __FUNCTION__
		}
		else {
			return $d;
		}
	}
}