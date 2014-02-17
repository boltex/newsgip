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

        case "username":

            if (empty($_POST['username'])){
                $errors['message'] = 'username is required.';
            }else{    
                $username = $_POST['username'];
                // verify username
                // if ok get password key 
                
                try{
                    $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
                    if (!$dblink) {
                        $_SESSION = array(); 
                        session_destroy();
                        $errors['message'] = 'No mysql_connect link established.';
                    }
                    mysql_select_db($db_database,$dblink); // same name : sgipuser
                } catch(Exception $e) {
                    $_SESSION = array(); 
                    session_destroy();
                    $errors['message'] = 'Error mysql_select_db';
                }

                $opexists=mysql_query("SELECT OperatorIndex, OperatorPasswordKey FROM OperatorTable WHERE OperatorName='$username' and enabled='1'");

                if(mysql_num_rows($opexists)==0){  
                    // does NOT EXISTS 
                    $_SESSION = array(); 
                    session_destroy();
                    $errors['message'] = "$username is not recognised";
                }else{
                    // EXISTS !!!
                    $_SESSION["username"]=$_POST[username];
                    $_SESSION["islogged"]="0";
                    $tableau = mysql_fetch_array($opexists);
                    $oppasskey = $tableau['OperatorPasswordKey'];
                    $_SESSION["oppasskey"]= $oppasskey;
                    $_SESSION["userindex"]= $tableau['OperatorIndex'];
                    $data['passkey'] = $oppasskey;
                    $data['message'] = 'username OK';
                }
            }

            break;

        case "password":
            if (empty($_POST['password']))
                $errors['message'] = 'password is required.';

            if (empty($_POST['jskey']) || !is_numeric($_POST['jskey']) )
               $errors['message'] = 'jskey is required.';

            if (!isset($_SESSION['username']))  
                $errors['message'] = 'Cookies must be enabled.';  

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
                        $errors['message'] = 'Error mysql_connect';
                    }else{
                    mysql_select_db($db_database,$dblink); // same name : sgipuser
                    }
                } catch(Exception $e) {
                    $_SESSION = array(); 
                    session_destroy();
                    $errors['message'] = 'Error mysql_select_db';
                }
            }

            if ( empty($errors)) {
                $opexists=mysql_query("SELECT OperatorIndex, OperatorPassword, OperatorPasswordKey, OperatorLastSalt, OperatorIsAdmin FROM OperatorTable WHERE OperatorName='$username'");
                if(mysql_num_rows($opexists)==0){   
                    $_SESSION = array(); 
                    session_destroy();
                    $errors['message'] = "$username is not recognised";
                }else{
                    $tableau = mysql_fetch_array($opexists);
                    $oppass = $tableau['OperatorPassword'];
                    $oppasskey = $tableau['OperatorPasswordKey'];
                    $oplastsalt = $tableau['OperatorLastSalt'];
                    $opisadmin = $tableau['OperatorIsAdmin'];
                    $userindex =  $tableau['OperatorIndex'];
                    if( ((int)$jskey < (int)$oplastsalt) || (int)$jskey==0 ){
                        $_SESSION = array(); 
                        session_destroy();
                        $errors['message'] = "Please check your computer clock";
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
                    $errors['message'] = "Wrong password for $username";
            }

            if ( empty($errors)) {
                    // if success save jskey as OperatorLastSalt , set sessions etc..
                    $updatesuccess=mysql_query("UPDATE OperatorTable SET OperatorLastSalt='$jskey' WHERE OperatorName='$username'");
                    $_SESSION["islogged"]="1";
                    $_SESSION["isadmin"]=$opisadmin ;
                    $_SESSION["username"]=$username;
                    $_SESSION["userindex"]=$userindex;        
                    $_SESSION['managingsite']=0;
                    $_SESSION['tablepastpage']=1;
                    $_SESSION['rowsperpage']=5;
                    $data['message'] = 'Logged In';
            }



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
