<?php

    require_once 'config.php';
  
    //Select Collection
    $collection = $db->users;

    if(isset($_POST['email'])) {

      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $middleName = $_POST['middleName'];
      $email = $_POST['email'];
      $hospital = $_POST['hospital'];

     

      //Search hospital
      $cursor = $db->hospital_name->find(['name' => $hospital]); 

      foreach ($cursor as $result) {
        $accessCode = $result['code'];
      
          $hashed = password_hash($accessCode, PASSWORD_DEFAULT);

          $insert = $collection->insertOne(['firstName' => $firstName, 'lastName' => $lastName, 'middleName' => $middleName, 'email' => $email, 'hospital' => $hospital, 'password' => $hashed, 'role' => "user"]); 

          echo json_encode($insert->getInsertedId());
        }  
      };

    


?>