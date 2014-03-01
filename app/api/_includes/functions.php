<?php

function quitMessage(&$errors,&$data, $message){
	$errors['message'] = $message;
	$_SESSION = array(); 
    session_destroy();
    $data['success'] = false;
    $data['errors']  = $errors;
    echo json_encode($data);
    exit();
}

function premonitor(&$errors, &$data){
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
	$user=array(
        'isadmin' => $_SESSION["isadmin"],
        'username' => $_SESSION["username"],
        'userindex' => $_SESSION["userindex"],
        'rowsperpage' =>$_SESSION['rowsperpage']
    );
    $data['user']= $user;
    $data['sites'] = $r;
}

function monitor(&$errors, &$data){

	$managingsite = $_SESSION['managingsite'];
	 $siteexists=mysql_query("SELECT SiteProtocolText, SiteName, SiteMapUrl FROM SitesTable WHERE SiteIndex='$managingsite'");
	    $numofsites = mysql_num_rows($siteexists);     
	       if($numofsites>0){
	        $sitedata= mysql_fetch_assoc($siteexists );
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
	$data['sitedata'] = $sitedata; 
 	$data['tablepast'] = $tablepast;  
}

function pagenav(&$errors, &$data){
	$currentsite = $_SESSION['managingsite'];	
	if($currentsite==0 or $currentsite=="none"){
		$_SESSION['tablelastpage'] = $data['tablelastpage']= 0;
		$data['test'] = "currentsite is".$currentsite;
		return;
	}
	$query   = "SELECT COUNT(EventIndex) AS numrows FROM EventTable WHERE EventSite='$currentsite'";
	$result  = mysql_query($query) or die('Error, query pagenav failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
	// #####    how many pages we have when using paging?
	$maxPage = ceil( $numrows/  $_SESSION['rowsperpage'] );
	$_SESSION['tablelastpage'] = $data['tablelastpage']= $maxPage;
	$data['tablepastpage'] = $_SESSION['tablepastpage'];
}



?>

