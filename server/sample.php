<?php

  require_once './config.php';
  session_start();

  //Select Collection
  $collection = $db->sample;

    $updatePassword = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID('62baa2a4c7da73ffe752e1a5')],
        ['$set' => ['password' => 'yesyes']]
    );

     echo $updatePassword->getModifiedCount();


?>