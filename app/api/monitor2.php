<?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();      // array to hold validation errors
$data   = array();      // array to pass back data

// validate the variables ====================================================
if (empty($_POST['action']))
    $errors['message'] = 'action is required.';

$action = $_POST['action'];

if ( empty($errors)) {
    switch ( $action ){

        case "premonitor":
        	break;

        case "selectsite":
        	break;

        case "username":
        	break;

        default:
            break;

    }
}



// return a response =========================================================
    // response if there are errors
    if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors, return a message
        $data['success'] = true;
        
    }

    // return all our data to an AJAX call
    echo json_encode($data);




?>
