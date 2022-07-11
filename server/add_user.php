<?php

    require_once 'config.php';

    if(isset($_POST['email'])) {

      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $middleName = $_POST['middleName'];
      $email = $_POST['email'];
      $hospital = mysqli_real_escape_string($conn, $_POST['hospital']);


      $emailCheck = $conn->prepare("SELECT email FROM users where email = ?;");
      $emailCheck->bind_param('s', $email);
      $emailCheck->execute();
      $emailCheck->store_result();
      $row_count = $emailCheck->num_rows();

        if($row_count > 0) {
          echo json_encode("Email exist");
        } else {
           // GET HOSPITAL ID and SET DEFAULT PASSWORD(Access Code)
          $getHospital = $conn->prepare("SELECT * FROM hospitals where name = '$hospital';");
          $getHospital->execute();
          $getResult = $getHospital->get_result();

          while($result = $getResult->fetch_assoc()) {

            $hashed = password_hash($result["code"], PASSWORD_DEFAULT);
            // INSERT TO USERS TABLE
            $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, middleName, email, password, FK_hospitalId) values(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $firstName, $lastName, $middleName, $email, $hashed, $result['hospitalId']);

            $res = $stmt->execute();

            if($res) {
              echo 1;        
            } else {
              echo 0;
            }
          }
        }
    } 
?>