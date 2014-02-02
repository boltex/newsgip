<?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

    if (empty($_POST['password']))
        $errors['password'] = 'password is required.';

    if (empty($_POST['jskey']) || !is_numeric($_POST['jskey']) )
	   $errors['jskey'] = 'jskey is required.';

    if (!isset($_SESSION['username']))
        $errors['username'] = 'Cookies must be enabled.';

// if no errors so far ... 
if ( empty($errors)) {
    // get password from db, also get OperatorLastSalt
    $username = $_SESSION["username"] ;
    $password = $_POST["password"] ;
    $jskey = $_POST["jskey"] ;

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

if ( empty($errors)) {
    $opexists=mysql_query("SELECT OperatorIndex, OperatorPassword, OperatorPasswordKey, OperatorLastSalt, OperatorIsAdmin FROM OperatorTable WHERE OperatorName='$username'");
    if(mysql_num_rows($opexists)==0){   
        $_SESSION = array(); 
        session_destroy();
        $errors['username'] = "$username is not recognised";
    }else{
        $tableau = mysql_fetch_array($opexists);
        $oppass = $tableau['OperatorPassword'];
        $oppasskey = $tableau['OperatorPasswordKey'];
        $oplastsalt = $tableau['OperatorLastSalt'];
        $opisadmin = $tableau['OperatorIsAdmin'];
        if( ((int)$jskey < (int)$oplastsalt) || (int)$jskey==0 ){
            $_SESSION = array(); 
            session_destroy();
            $errors['username'] = "Please check your computer clock";
        }
    }
}
// do md5( password+jskey) 
$ourmd5 = md5( $oppass.$jskey  );
$ourmd5= substr($ourmd5, 0,20);
$password=substr($password, 0,20);
if($ourmd5 != $password){
        $_SESSION = array(); 
        session_destroy();
        $errors['username'] = "$ourmd5 $password Wrong password for $username";
}

if ( empty($errors)) {
        // if success save jskey as OperatorLastSalt , set sessions etc..
        $updatesuccess=mysql_query("UPDATE OperatorTable SET OperatorLastSalt='$jskey' WHERE OperatorName='$username'");
        $_SESSION["islogged"]="1";
        $_SESSION["isadmin"]=$opisadmin ;
        $_SESSION['tablepastpage']=1;
        $_SESSION['managingsite']=0;
}
	// response if there are errors
	if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
        // if there are items in our errors array, return those errors
        $errors['testmd5'] = md5('abc');
        $data['success'] = false;
        $data['errors']  = $errors;
	} else {
        // if there are no errors, return a message
        $data['success'] = true;
        $data['message'] = 'Logged In';
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?>
