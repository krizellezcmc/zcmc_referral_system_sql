<?php 

    session_start();

    $permission = $_SESSION['auth'];
    $access = $_SESSION['role'];

    if($access != 'user'){
         header("location: ../$access");  
    }
         
    
?>