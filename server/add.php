<?php
  require_once 'config.php';

  $hospital = $_POST['hospital'];
  $codeInput = $_POST['code'];

   //GET HOSPITAL ID and SET DEFAULT PASSWORD(Access Code)
    $getHospital = $conn->prepare("SELECT * FROM hospitals where name = '$hospital';");
    $getHospital->execute();
    $getHospital->store_result();
    $row_count = $getHospital->num_rows();

      if($row_count > 0) {
        echo 3;
      } else {
        //INSERT HOSPITAL
        $stmt = $conn->prepare("INSERT INTO hospitals (code, name) values(?, ?)");
        $stmt->bind_param("is", $codeInput, $hospital);
        $res = $stmt->execute();

        if($res) {
          echo 1;        
        } else {
          echo 0;
        }
      }
  
?>