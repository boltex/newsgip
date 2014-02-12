<?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

if (empty($_POST['username'])){
    $errors['username'] = 'Name is required.';
}else{    
    $username = $_POST['username'];
    // verify username
    // if ok get password key 
    
    try{
        $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
        if (!$dblink) {
            $_SESSION = array(); 
            session_destroy();
            $errors['mysql'] = 'No mysql_connect link established.';
        }
        mysql_select_db($db_database,$dblink); // same name : sgipuser
    } catch(Exception $e) {
        $_SESSION = array(); 
        session_destroy();
        $errors['mysql'] = 'Error mysql_select_db';
    }

    $opexists=mysql_query("SELECT OperatorIndex, OperatorPasswordKey FROM OperatorTable WHERE OperatorName='$username' and enabled='1'");

    if(mysql_num_rows($opexists)==0){  
        // does NOT EXISTS 
        $_SESSION = array(); 
        session_destroy();
        $errors['username'] = "$username is not recognised";
    }else{
        // EXISTS !!!
        $_SESSION["username"]=$_POST[username];
        $_SESSION["islogged"]="0";
        $tableau = mysql_fetch_array($opexists);
        $oppasskey = $tableau['OperatorPasswordKey'];
        $_SESSION["oppasskey"]= $oppasskey;
        $_SESSION["userindex"]= $tableau['OperatorIndex'];

    }
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
        $data['passkey'] = $oppasskey;
        
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?>
