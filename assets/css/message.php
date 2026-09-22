<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

    var $main_model = 'Message_model';

    function __construct() {
        parent::__construct();
        $this->data['breadcrumbs'] = array(array('label' => 'Berichten', 'url' => 'message'));
        if (!$this->ion_auth->in_group(array('admin', 'admin_channel'))) {
            redirect(site_url());
            die();
        }
    }

    function index() {
        $this->data['page_title'] = 'Berichten';
        $this->data['columns'] = array(
            'last_updated' => array(
                'title' => 'Verstuurd',
            ),
            'channelId' => array(
                'title' => 'Kanaal',
            ),
	        'language' => array(
		        'title' => 'Taal',
	        ),
            'category' => array(
                'title' => 'Type',
            ),
            'title' => array(
                'title' => 'Titel',
                'template' => '_edit_message'
            ),
            'message' => array(
                'title' => 'Bericht'
            )
        );
        $this->data['edit_url'] = '/message/edit/';
        $this->data['delete_url'] = '/message/delete/';
        $this->data['new_url'] = '/message/create';
	    if ($this->ion_auth->is_admin())
	        $this->data['records'] = $this->Message_model->get_records();
	    else
		    $this->data['records'] = $this->Message_model->get_channel_records();
        $this->render();
    }

    function create($id = false) {
        if (is_numeric($id)) {
            $this->data['breadcrumbs'][] = array('label' => 'Bericht wijzigen');
        } else {
            $this->data['breadcrumbs'][] = array('label' => 'Bericht sturen');
        }
        $this->data['edit'] = is_numeric($id);

        if (!empty($_POST)) {
            $this->form_validation->set_rules('title', 'Titel', 'required|xss_clean|min_length[3]');
            $this->form_validation->set_rules('message', 'Bericht', 'required|xss_clean');
            $this->form_validation->set_rules('channel', 'Saleskanaal', 'required|xss_clean');
            $this->form_validation->set_rules('categorieId', 'Link', 'xss_clean');
	        $this->form_validation->set_rules('language', 'Taal', 'xss_clean');

            $insert = array(
                'title' => $this->input->post('title'),
                'author' => $this->user->id,
                'message' => $this->input->post('message'),
                'channelId' => $this->input->post('channel'),
                'messagecatId' => $this->input->post('type'),
                'categorieId' => $this->input->post('categorieId'),
            );
	        if ($this->input->post('language') != 'ALL')
		        $insert['language_id'] = $this->input->post('language');

            if ($this->form_validation->run() == true) {
                if ($id) {
                    $this->Message_model->update($insert, $id);
                    $ex = $this->Message_model->find($id);
                    redirect('/message/');
                } else {
	                $androidTokens = $this->Message_model->pushNotificationTokens($this->input->post('channel'), "ANDROID", $this->input->post('language'));
	                $iosTokens = $this->Message_model->pushNotificationTokens($this->input->post('channel'), "IOS", $this->input->post('language'));
	                if (count($iosTokens) > 0) {
		                $this->sendIOSNotification($iosTokens, $this->input->post('message'));
	                }
	                if (count($androidTokens) > 0) {
		                $this->sendAndroidNotification($this->input->post('channel'), $androidTokens, $this->input->post('message'), $this->input->post('title'));
	                }
                    $this->Message_model->insert($insert);
                    redirect('/message/');
                }
                die;
            } else {
                $this->data['message'] = validation_errors();
                $this->data = array_merge($this->data, $insert);
            }
        } else {
            if ($id) {
                $this->data = array_merge($this->data, $this->Message_model->find($id));
            }

            $select_channels = array();
            $selected_channel = NULL;
            $channels = $this->Channel_model->get_channels(); //this->ion_auth->groups()->result_array();
            if (!empty($channels)) {
                foreach ($channels as $group) {
                    $select_channels[$group->id] = $group->name;
                }
            }
            if ($id) {
                $selected_channel = $this->data["channelId"];
            } else
	            $selected_channel = $this->user->channelId;
            $this->data['channels'] = $select_channels;
            $this->data['channel_selected'] = $selected_channel;

            $select_types = array();
            $selected_type = NULL;
            $types = $this->db->select('*')->from("messagecats")->get()->result_array();
            if (!empty($types)) {
                //print_r($types);
                foreach ($types as $type) {
                    $select_types[$type["id"]] = $type["name"];
                }
            }
            if ($id) {
                $selected_type = $this->data["messagecatId"];
            }
            $this->data['types'] = $select_types;
            $this->data['type_selected'] = $selected_type;
        }

        $this->render();
    }

    function show($id) {
        $exCrumb = $this->Company_model->get_exhibition_crumb($id);
        $this->data['breadcrumbs'][] = array('label' => $exCrumb['name'], 'url' => 'exhibition/show/' . $exCrumb['id']);

        $this->data['page_title'] = 'Vacatures';
        $this->data['columns'] = array(
            'id' => array(
                'title' => 'id',
                'visibility' => 'hidden'
            ),
            'vdab_vac_nr' => array(
                'title' => 'Vacature nummer',
                'template' => '_edit_user'
            ),
            'name' => array(
                'title' => 'Functienaam',
            /* 'template' => '_edit_user' */
            ),
            'total_available' => array(
                'title' => 'Aantal beschikbaar'
            )
        );
        $this->data['edit_url'] = '/job/edit/';
        $this->data['delete_url'] = '/job/delete/';
        $this->data['new_url'] = '/job/create';
        $this->data['records'] = $this->Job_model->get_records(false, $id, array_keys($this->data['columns']));
        $this->data['company'] = $this->Company_model->find($id);
        $this->data['page_title'] = $this->data['company']['name'];
        $this->data['breadcrumbs'][] = array('label' => $this->data['company']['name']);
        $this->render();
    }

    function sendAndroidNotification($channelId, $registrationIDs, $message, $title) {
        //$message = utf8_encode($message);
        $channel = $this->Channel_model->find($channelId);
        // Replace with real BROWSER API key from Google APIs
        //$apiKey = "AIzaSyALqKeiNX7_ob8zFnKRRHq4ALlj2fOoIIg";
        //$apiKey = 'AIzaSyBKzMvTVMUIHmWu2OuZmY1BYqh_q2D44e8'; //BROWSER
        $apiKey = "AIzaSyA7-Mm2d0kxpA4XpAtTAYvcR7UNx1Ks8qg"; //SERVER
// Replace with real client registration IDs 
        //$registrationIDs = array("123", "456");
// Message to be sent
        // $message = "x";
// Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $registrationIDs,
            'data' => array("message" => $message, "title" => $title, "channelId" => $channelId, "channelName" => $channel["name"]),
        );

        //print_r($_SERVER['SERVER_ADDR']);

        $payload = json_encode($fields);
        //print_r($payload);

        $headers = array(
            "Authorization:key=" . $apiKey,
            "Content-Type: application/json"
        );

// Open connection
        $ch = curl_init();

// Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Execute post
        $result = curl_exec($ch);

// Close connection
        curl_close($ch);

        //echo $result;
    }

    function iosTest() {
        print_r($this->Message_model->pushNotificationTokens("1", "IOS"));
        $this->sendIOSNotification($this->Message_model->pushNotificationTokens("1", "IOS"), "test");
        echo "Send!";
    }

    function iosPortTest() {
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'apn.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', 'aaa');
        $fp = stream_socket_client("ssl://gateway.sandbox.push.apple.com:2195", $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

        if ($fp)
            echo ('aa');
        else
            echo ($err . $errstr);
    }

    /* function androidTest() {
      print_r($this->Message_model->pushNotificationTokens("1", "ANDROID"));
      $this->sendAndroidNotification($this->Message_model->pushNotificationTokens("1", "ANDROID"), "test");
      //echo "Send!";
      } */

    function sendIOSNotification($registrationIDs, $messageText) {
        //$messageText = utf8_encode($messageText);
// Adjust to your timezone
        date_default_timezone_set('Europe/Rome');

// Report all PHP errors
        error_reporting(-1);

// Using Autoload all classes are loaded on-demand
        require_once './application/third_party/ApnsPHP/Autoload.php';

// Instanciate a new ApnsPHP_Push object
        $push = new ApnsPHP_Push(
                        ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
                        './application/third_party/server_certificates_bundle_sandbox.pem'
        );

// Set the Root Certificate Autority to verify the Apple remote peer
        $push->setRootCertificationAuthority('./application/third_party/entrust_root_certification_authority.pem');

// Connect to the Apple Push Notification Service
        $push->connect();

// Instantiate a new Message with a single recipient
        $message = new ApnsPHP_Message();

        foreach ($registrationIDs as $deviceToken) {
            $message->addRecipient($deviceToken);
        }

// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
// over a ApnsPHP_Message object retrieved with the getErrors() message.
        $message->setCustomIdentifier("Message-Badge-3");

        $message->setAutoAdjustLongPayload(TRUE);

// Set badge icon to "3"
        $message->setBadge(1);

// Set a simple welcome text
        $message->setText($messageText);
// Play the default sound
        $message->setSound();

// Set the expiry value to 30 seconds
        $message->setExpiry(30);

// Add the message to the message queue
        $push->add($message);

// Send all messages in the message queue
        $push->send();

// Disconnect from the Apple Push Notification Service
        $push->disconnect();

// Examine the error message container
        $aErrorQueue = $push->getErrors();
        if (!empty($aErrorQueue)) {
            var_dump($aErrorQueue);
        }
    }

	/*
	 * Get the available languages for a specified channel
	 */
	function ajaxLanguagesForChannel($channel) {
		$languages = $this->Channel_model->languages($channel);

		if (count($languages) > 1) {
			echo '<option value="ALL">Alle talen</option>';
			foreach ($languages as $row)
				echo "<option value=\"$row->languageId\">$row->name</option>";
		} else {
			echo '<option value="ALL">' . $languages[0]->name . '</option>';
		}
	}
}
