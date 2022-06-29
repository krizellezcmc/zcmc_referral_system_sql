<?php 

    session_start();

    $permission = $_SESSION['auth'];
    $access = $_SESSION['role'];
 
    if($access != 'admin'){
         header("location: ../$access");  
    } 
?>