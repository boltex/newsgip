<?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

// validate the variables ======================================================
	if (empty($_POST['username']))
		$errors['username'] = 'Name is required.';

	if (empty($_POST['password']))
		$errors['password'] = 'password is required.';
        
//	if (empty($_POST['jskey']))
//		$errors['jskey'] = 'jskey is required.';        

    
// return a response ===========================================================

	// response if there are errors
	if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors, return a message
		$data['success'] = true;
		$data['message'] = 'Success!';
          $data['passkey'] = 'somepasskeyx23ofk3pfk';
        
	}

	// return all our data to an AJAX call
	echo json_encode($data);




?>
