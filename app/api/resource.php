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
            if ($_SESSION['managingsite']==0 or $_SESSION['managingsite'] =="none"){
                premonitor($errors, $data);
            }else{
                premonitor($errors, $data);
                monitor($errors, $data);
                pagenav($errors, $data);
                cameras( $errors, $data);
            }
        	break;           

        case "selectsite":
            // SELECT SITE and MONITOR
            if (empty($_POST['SiteIndex']) or $_POST['SiteIndex']==0 or $_POST['SiteIndex'] =="none")
                quitMessage($errors,$data,'SiteIndex is required.');
            $_SESSION['managingsite'] =$_POST['SiteIndex'];
            $_SESSION['tablepastpage'] = 1; // back to page 1
            monitor($errors, $data);
            pagenav($errors, $data);
            cameras( $errors, $data);
        	break;

        case "changepage":
            // CHANGE PAGE and MONITOR
            if ($_SESSION['managingsite']==0 or $_SESSION['managingsite'] =="none")
                quitMessage($errors,$data,'managingsite was not set');
                     
                if ( !isset($_POST['page']) ){
                   quitMessage($errors,$data, 'Needs page');
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
                cameras( $errors, $data);
   
            break;     

        case "addentry":
            if( !isset($_POST['theentry']) || !isset($_POST['ts_started']) || !isset($_POST['theaction']) || !isset($_POST['thelicense']) || !isset($_POST['thecamera']) || $_SESSION['islogged']!="1"){
                quitMessage($errors,$data, 'You need cookies enabled');
            }

             $entrydesc =  $_POST['theentry'];
             $entryaction =  $_POST['theaction'];
             $entrylicense =  $_POST['thelicense'];
             $entrycamera =  $_POST['thecamera'];
             $ts_started = $_POST['ts_started'];
             if(get_magic_quotes_gpc())
              {
                $entrydesc =   stripslashes($entrydesc);
                $entryaction = stripslashes($entryaction);
                $entrylicense =stripslashes($entrylicense); // text 
                $entrycamera = stripslashes($entrycamera); // number
                $ts_started = stripslashes($ts_started); 
              }

            $entrydesc =   mysql_real_escape_string( $entrydesc );
            $entryaction = mysql_real_escape_string( $entryaction );
            $entrylicense = mysql_real_escape_string(  $entrylicense );
            $entrycamera = mysql_real_escape_string(  $entrycamera );
            $ts_started = mysql_real_escape_string(  $ts_started );

            // create entry
            //$querydesc = "INSERT INTO DescTable ( `Desc` ) ";
            $querydesc = "
            INSERT INTO `sgipuser`.`DescTable` (
            `DescIndex` ,
            `Desc`
            )
            VALUES (
            NULL , '$entrydesc'
            )
            ";


            //$querydesc = "INSERT INTO DescTable ( `Desc` ) ";
            //$querydesc .=  "VALUES ( '$entrydesc'  ) ";
            mysql_query("LOCK TABLES DescTable WRITE");
            mysql_query("SET AUTOCOMMIT = 0");
            mysql_query( $querydesc );
            //$mysql_id = mysql_query("SELECT LAST_INSERT_ID();");
            $mysql_descid = mysql_insert_id();
            mysql_query("COMMIT");
            mysql_query("UNLOCK TABLES");

            // create action
            $queryaction = "INSERT INTO ActionTable ( Action ) ";
            $queryaction .=   "VALUES ( '$entryaction'  ) ";
            mysql_query("LOCK TABLES ActionTable WRITE");
            mysql_query("SET AUTOCOMMIT = 0");
            mysql_query( $queryaction );
            //$mysql_id = mysql_query("SELECT LAST_INSERT_ID();");
            $mysql_actionid = mysql_insert_id();
            mysql_query("COMMIT");
            mysql_query("UNLOCK TABLES");

            //echo $mysql_actionid;

            $entrysite=$_SESSION["currentsite"];
            $entryoperator= $_SESSION["userindex"];

            $queryaction = "INSERT INTO `sgipuser`.`EventTable` (`EventIndex`,`EventSite`, `EventDescription`, `EventAction`, `EventLicense`, `EventCamera`, `EventOperator`, `EventStart`) ";
            $queryaction .= " VALUES (NULL, '$entrysite','$mysql_descid','$mysql_actionid', '$entrylicense' ,'$entrycamera' ,'$entryoperator' , FROM_UNIXTIME('$ts_started')   )";

            mysql_query("LOCK TABLES EventTable WRITE");
            mysql_query("SET AUTOCOMMIT = 0");
            mysql_query($queryaction );
            mysql_query("COMMIT");
            mysql_query("UNLOCK TABLES");
            break;

        case "editentry":
            // if !isset die
            if( !isset($_POST['entryindex']) || !isset($_POST['theentry']) || !isset($_POST['theaction']) || !isset($_POST['thelicense']) || !isset($_POST['thecamera']) || $_SESSION['islogged']!="1"){
                    quitMessage($errors,$data, 'You need cookies enabled');
            }
            // TEST FOR DATE TO
            if( !isset($_POST['thestarttime']) || !isset($_POST['theendtime']) ){
                    session_destroy();
                    header("Status: 200");
                    header("Location: ./?lastmessage=You need cookies enabled");
                    exit();
            }

            try{
                $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
                if (!$dblink) {
                    $_SESSION = array(); 
                    session_destroy();
                    header("Status: 200");
                    header("Location: ./?lastmessage=Error mysql_connect");
                    exit();
                }
                mysql_select_db($db_database,$dblink); // same name : sgipuser
            } catch(Exception $e) {
                $_SESSION = array(); 
                session_destroy();
                header("Status: 200");
                header("Location: ./?lastmessage=Error mysql_select_db");
                exit();
            }
             $entrydesc =  $_POST['theentry'];
             $entryaction =  $_POST['theaction'];
             $entrylicense =  $_POST['thelicense'];
             $entrycamera =  $_POST['thecamera'];
             $starttime =  $_POST['thestarttime'] ;
             $endtime = $_POST['theendtime'] ;
             
             if(get_magic_quotes_gpc())
              {
                $entrydesc =   stripslashes($entrydesc);
                $entryaction = stripslashes($entryaction);
                $entrylicense =stripslashes($entrylicense); // text 
                $entrycamera = stripslashes($entrycamera); // number
                $ts_started = stripslashes($ts_started); 
              }

            $entrydesc =   mysql_real_escape_string( $entrydesc );
            $entryaction = mysql_real_escape_string( $entryaction );
            $entrylicense = mysql_real_escape_string(  $entrylicense );
            $entrycamera = mysql_real_escape_string(  $entrycamera );
            $starttime =  mysql_real_escape_string($starttime)  ;
             $endtime = mysql_real_escape_string( $endtime) ;
            // todo CHECK VALID DATE 
             if ( ($timestamp = strtotime($starttime)) === false) {
               mysql_close($dblink);
               header("Status: 200");
               header("Location: monitoring.php?message=bad date format");
               exit();
             }else{
                // good 
             }
             if ( ($timestamp = strtotime($endtime)) === false) {
               mysql_close($dblink);
               header("Status: 200");
               header("Location: monitoring.php?message=bad date format");
               exit();
             }else{
                // good 
             } 

            // get existing desc and action data
            $entryindex = $_POST['entryindex'] ;
             $eventexists=mysql_query    (  "SELECT EventDescription, EventAction FROM EventTable WHERE EventIndex='$entryindex'");
            $tableau = mysql_fetch_array($eventexists);
              
            $descindex=   $tableau['EventDescription'];  
            $actionindex= $tableau['EventAction'];  

            // change existing desc and action
            //mysql_query( "UPDATE DescTable SET Desc = '$entrydesc' WHERE DescIndex = '$descindex'" );
            mysql_query( "UPDATE `sgipuser`.`DescTable` SET `Desc` = '$entrydesc' WHERE `DescTable`.`DescIndex` =$descindex");


            mysql_query( "UPDATE ActionTable SET Action = '$entryaction' WHERE ActionIndex = '$actionindex'");
            // update license and camera only
            mysql_query( "UPDATE `sgipuser`.`EventTable` SET 
            `EventLicense` =  '$entrylicense', 
            `EventCamera` = '$entrycamera', 
            `EventStart` = '$starttime',
            `EventEntered` = '$endtime'
            WHERE `EventTable`.`EventIndex` =$entryindex");
            break;

        case "delentry":
            if ( !isset($_POST['checkselect'])  || !isset($_SESSION['username']) || $_SESSION["islogged"]!="1" ){
                quitMessage($errors,$data, 'Cookies must be enabled');
            }

            $eventindex = $_POST['checkselect'];
            // get info about event entry
            $eventexists=mysql_query("SELECT EventDescription, EventAction FROM EventTable WHERE EventIndex='$eventindex'");

            $tableau = mysql_fetch_array($eventexists);
              
            $descindex=$tableau['EventDescription'];   
            $actionindex= $tableau['EventAction'];   
            // del desc 
            mysql_query("DELETE FROM `sgipuser`.`DescTable` WHERE `DescTable`.`DescIndex` = $descindex");

            // del action
            mysql_query("DELETE FROM `sgipuser`.`ActionTable` WHERE `ActionTable`.`ActionIndex` = $actionindex");
             
            //( the rest is in the entry) 
            mysql_query("DELETE FROM `sgipuser`.`EventTable` WHERE `EventTable`.`EventIndex` = $eventindex");

            break;     

        case "rowsperpage":
            // TODO : FIX STARTING PAGE  :  $_SESSION['tablepastpage']
            // from functions : $startingpage = ( intval($_SESSION['tablepastpage'])- 1 ) * intval($_SESSION['rowsperpage']);
            $startingpage = ( intval($_SESSION['tablepastpage'])- 1 ) * intval($_SESSION['rowsperpage']);
            $_SESSION['tablepastpage'] = floor( intval($startingpage) / intval($_POST['rowsperpage']) +1 );
            // 
            $_SESSION['rowsperpage'] = $data['rowsperpage'] = $_POST['rowsperpage'];
            monitor($errors, $data);
            pagenav($errors, $data);
            cameras( $errors, $data);

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
