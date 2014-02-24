<?php
require('_includes/sgipdata.php');
require('_includes/functions.php');
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data


    if ($_SESSION["islogged"]!="1"){
        $errors['message'] = 'Not logged.';
        $data['success'] = false;
        $data['errors']  = $errors;
        echo json_encode($data);
        exit();

        }
    if (!isset($_SESSION['username']))  
        $errors['message'] = 'Cookies must be enabled.'; 
     if (!isset($_SESSION['managingsite']))  
        $errors['message'] = 'managingsite session var missing'; 
    if (!isset($_SESSION['tablepastpage']))  
        $errors['message'] = 'tablepastpage session var missing';            
    if (!isset($_SESSION['isadmin']))  
        $errors['message'] = 'isadmin session var missing'; 

// if no errors so far ... 
if ( empty($errors)) {

    try{
        $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
        if (!$dblink) {
            $_SESSION = array(); 
            session_destroy();
            $errors['mysql'] = 'Error mysql_connect';
        }else{
        mysql_select_db($db_database,$dblink); // same name : sgipuser
        }
    } catch(Exception $e) {
        $_SESSION = array(); 
        session_destroy();
        $errors['mysql'] = 'Error mysql_select_db';
    }
}

if ($_SESSION['managingsite']==0){
//-----------------------------------------------------------
    $numofsites=0;
    $allsites=array();
    // get all sites
    $siteexists=mysql_query("SELECT SiteIndex, SiteName, SiteMapUrl  FROM SitesTable ");
    $numofsites = mysql_num_rows($siteexists); 

    if($numofsites>0){ 
        while( $anentry= mysql_fetch_assoc($siteexists )   ){
            $r[]=$anentry;
        }
    }else{
        $r = array(
        "SiteIndex" => "0",
        "SiteName" => "none",
        "SiteMapUrl" => "defaultimage.jpg"
         );
    }

    //while($r[]=mysql_fetch_array($siteexists)); //$r now contains whole array


    // return a response : if success give $oppasskey  ============================
    // response if there are errors
    if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        $user=array(
        'isadmin' => $_SESSION["isadmin"],
        'username' => $_SESSION["username"],
        'userindex' => $_SESSION["userindex"]
        );
        $data['user']= $user;

        // if there are no errors, return a message
        $data['success'] = true;
        $data['sites'] = $r;
        
    }
    // return all our data to an AJAX call
    echo json_encode($data);
}else{
// ==================================================== ALREADY CHOSEN A SITE TO MANAGE


}


?>