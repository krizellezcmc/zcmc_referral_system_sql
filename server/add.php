<?php
  require_once 'config.php';

  $hospital = $_POST['hospital'];
  $codeInput = $_POST['code'];
  $address = $_POST['address'];

  
   //Select Collection
  $collection = $db->hospital_name;

  $insert = $collection->insertOne(['name' => $hospital, 'code' => $codeInput, 'address' => $address]); 

  echo json_encode($insert->getInsertedCount());
  
?>