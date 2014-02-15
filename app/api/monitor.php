<?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data


    if ($_SESSION["islogged"]!="1")
        $errors['message'] = 'Not logged.';
    if (!isset($_SESSION['username']))  
        $errors['message'] = 'Cookies must be enabled.'; 
     if (!isset($_SESSION['managingsite']))  
        $errors['message'] = 'managingsite session var missing'; 
    if (!isset($_SESSION['tablepastpage']))  
        $errors['message'] = 'tablepastpage session var missing';            
    if (!isset($_SESSION['isadmin']))  
        $errors['message'] = 'isadmin session var missing'; 

    if (empty($_POST['SiteIndex']))
        $errors['message'] = 'SiteIndex is required.';

// if no errors so far ... 
if ( empty($errors)) {

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

// if no errors so far ... 
if ( empty($errors)) {
// if no site return site list only
// 
	$managingsite = $_POST['SiteIndex'];
    $siteexists=mysql_query("SELECT SiteProtocolText, SiteName, SiteMapUrl FROM SitesTable WHERE SiteIndex='$managingsite'");
    $numofsites = mysql_num_rows($siteexists);     
       if($numofsites>0){
        $sitedata= mysql_fetch_assoc($siteexists )  ;

//==================================================== COMPUTE STARTING 
$startingpage = ( intval($_SESSION['tablepastpage'])- 1 ) * intval($_SESSION['rowsperpage']);   
    
$tablepastquery="
SELECT `EventIndex` , `EventStart` , `EventEntered`, `EventLicense` , `Desc` , `Action` , `CameraName`
FROM `EventTable` , `DescTable` , `ActionTable` , `CameraTable`
WHERE `EventTable`.`EventDescription` = `DescTable`.`DescIndex`
AND `EventTable`.`EventAction` = `ActionTable`.`ActionIndex`
AND `EventTable`.`EventCamera` = `CameraTable`.`CameraIndex`
AND `EventSite` = '$managingsite' ORDER BY `EventStart` DESC 
LIMIT $startingpage , $GLOBALS[rowsperpage]
";    
    $eventsexists = mysql_query($tablepastquery);
    $numofevents = @mysql_num_rows($eventsexists); 
	 if($numofevents>0){
	    // while loop
	        while( $anentry= mysql_fetch_assoc($eventsexists )   ){
	            $tablepast[]=$anentry;
	        }
	  }else{
		 $errors['message'] = 'No events from table';
	  }

   }else{
   	 $errors['message'] = 'No sites defined in DB. SiteIndex is '.$_POST['SiteIndex']."num of sites : ".$numofsites;
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
        $data['sitedata'] = $sitedata;
        $data['tablepast'] = $tablepast;

        //$_SESSION["isadmin"]
        
    }
    // return all our data to an AJAX call
    echo json_encode($data);

?>
