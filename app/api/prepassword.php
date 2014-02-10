<?php
//require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();


$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data


    if (!isset($_SESSION['oppasskey'])){
        $errors['errors'] = 'Cookies must be enabled.'; 
	}else{
		$data['success'] = true;
        $data['passkey'] = $_SESSION['oppasskey'];
	}

// return a response : if success give $oppasskey  ============================
	// response if there are errors
	if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors, return a message
		$data['success'] = true;
		$data['message'] = 'exists';
        
	}
	// return all our data to an AJAX call
	echo json_encode($data);




?>