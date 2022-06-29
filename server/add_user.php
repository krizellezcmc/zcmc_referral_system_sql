<?php

    require_once 'config.php';
  
    //Select Collection
    $collection = $db->users;

    if(isset($_POST['email'])) {

      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $middleName = $_POST['middleName'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $hashed = password_hash($password, PASSWORD_DEFAULT);

      $insert = $collection->insertOne(['firstName' => $firstName, 'lastName' => $lastName, 'middleName' => $middleName, 'email' => $email, 'password' => $hashed, 'role' => "user"]); 

      echo json_encode($insert->getInsertedId());
    }
    


?>