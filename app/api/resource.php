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
if (!isset($_SESSION['rowsperpage']))  
    quitMessage($errors,$data, 'rowsperpage session var missing'); 

if (empty($_POST['action']))
    quitMessage($errors,$data, 'action is required.');
$action = $_POST['action'];

//----------------------------------------------- MYSQL CONNECTION
try{
    $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
    if (!$dblink) {
        quitMessage($errors,$data, 'Error mysql_connect');
    }else{
    mysql_select_db($db_database,$dblink); // same name : sgipuser
    }
} catch(Exception $e) {
    quitMessage($errors,$data, 'Error mysql_select_db');
}

if ( empty($errors)) {
    switch ( $action ){

        case "premonitor":
            // PREMONITOR, or if site: MONITOR
            if ($_SESSION['managingsite']==0){
                premonitor($errors, $data);
            }else{
                premonitor($errors, $data);
                monitor($errors, $data);
                pagenav($errors, $data);
            }
        	break;           

        case "selectsite":
            // SELECT SITE and MONITOR
            if (empty($_POST['SiteIndex']))
                quitMessage($errors,$data,'SiteIndex is required.');
            $_SESSION['managingsite'] =$_POST['SiteIndex'];
            $_SESSION['tablepastpage'] = 1; // back to page 1
            premonitor($errors, $data);
            monitor($errors, $data);
            pagenav($errors, $data);
        	break;

        case "changepage":
            // CHANGE PAGE and MONITOR
                if ( !isset($_POST['page']) ){
                    die("Needs page ");
                }
                if( $_POST['page']=="goto" ){
                    $_SESSION['tablepastpage'] =(  (int)$_POST['thegoto']  ) ;
                    if (!is_int($_SESSION['tablepastpage'])){
                        $_SESSION['tablepastpage'] =1;
                    }
                }
                if( $_POST['page']=="next" ){
                    $_SESSION['tablepastpage'] +=1;
                }
                if( $_POST['page']=="prev" ){
                    $_SESSION['tablepastpage'] -=1;
                }
                if($_SESSION['tablepastpage'] <1){
                    $_SESSION['tablepastpage'] =1;
                }
                if( $_POST['page']=="first" ){
                    $_SESSION['tablepastpage'] = 1;
                }
                if( $_POST['page']=="last" ){
                    $_SESSION['tablepastpage'] = $_SESSION['tablelastpage'];
                }
                if ( $_SESSION['tablepastpage'] > $_SESSION['tablelastpage']){
                    $_SESSION['tablepastpage'] = $_SESSION['tablelastpage']; 
                }
                monitor($errors, $data);
                pagenav($errors, $data);
   
            break;     

        case "addentry":
            
            break;

        case "editentry":
            break;

        case "delentry":
            break;     

        case "rowsperpage":
            $_SESSION['rowsperpage'] = $data['rowsperpage'] = $_POST['rowsperpage'];
            premonitor($errors, $data);
            monitor($errors, $data);
            pagenav($errors, $data);
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
