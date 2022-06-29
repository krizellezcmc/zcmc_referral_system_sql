<?php

  require_once './config.php';
  session_start();

  $currentInput = $_POST['current'];
  $newInput = $_POST['new'];
  $userId = $_SESSION['userId'];

  
  $hashed = password_hash($newInput, PASSWORD_DEFAULT);

  //Select Collection
  $collection = $db->users;

  $cursor = $collection->find(['_id' => $userId]); 

  foreach ($cursor as $user) {
    $currentPassword = $user['password'];

    if(password_verify($currentInput, $currentPassword)) {

      
      $updatePassword = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($userId)],
        ['$set' => ['password' => $hashed]]
      );

       echo $updatePassword->getModifiedCount();
      
    } else {
      echo json_encode("invalid"); 
    }
  }

?>