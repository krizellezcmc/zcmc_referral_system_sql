<?php
  require_once './config.php';

  $hospital = $_POST['hospital'];
  $codeInput = $_POST['code'];

  //Select Collection
  $collection = $db->hospital_name;

  $cursor = $collection->find(['name' => $hospital]); 

  foreach ($cursor as $result) {
    $accessCode = $result['code'];
    
    if($codeInput == $accessCode){
        echo json_encode("Proceed");
    } else {
        echo json_encode("Denied");
    }
  };
   
?>