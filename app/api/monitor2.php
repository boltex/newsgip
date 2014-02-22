<?php
require('_includes/sgipdata.php');
require('_includes/functions.php');
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();      // array to hold validation errors
$data   = array();      // array to pass back data

    if ($_SESSION["islogged"]!="1")
        quitMessage($errors,$data, 'Not logged.');
    if (!isset($_SESSION['username']))  
        quitMessage($errors,$data,  'Cookies must be enabled.'); 
    if (!isset($_SESSION['managingsite']))  
        quitMessage($errors,$data, 'managingsite session var missing'); 
    if (!isset($_SESSION['tablepastpage']))  
        quitMessage($errors,$data, 'tablepastpage session var missing');            
    if (!isset($_SESSION['isadmin']))  
        quitMessage($errors,$data, 'isadmin session var missing'); 

// validate the variables ====================================================
if (empty($_POST['action']))
    quitMessage($errors,$data, 'action is required.');

$action = $_POST['action'];

if ( empty($errors)) {
    switch ( $action ){

        case "premonitor":
            // PREMONITOR, or if site: MONITOR
        	break;

        case "changepage":
            // CHANGE PAGE and MONITOR
            break;            

        case "selectsite":
            // SELECT SITE and MONITOR
        	break;

        case "addentry":
            
            break;

        case "editentry":
            break;

        case "delentry":
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
