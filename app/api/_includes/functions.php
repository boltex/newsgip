<?php

function quitMessage($errors,$data, $message){
	$errors['message'] = $message;
	$_SESSION = array(); 
    session_destroy();
    $data['success'] = false;
    $data['errors']  = $errors;
    echo json_encode($data);
    exit();
}

?>