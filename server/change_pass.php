<?php

  require_once './config.php';
  session_start();

  $currentInput = $_POST['current'];
  $newInput = $_POST['new'];
  $userId = $_SESSION['userId'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE userId = ?");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();

  if(mysqli_num_rows($result) > 0) {
    while($user = $result->fetch_assoc()) {
      if(password_verify($currentInput, $user['password'])) {

        $hashed = password_hash($newInput, PASSWORD_DEFAULT);

        $update = $conn->prepare("UPDATE users SET password = ? where userId = ?");
        $update->bind_param("si", $hashed, $userId);
        $res = $update->execute();

        if($res) {
          echo json_encode(1);
        }

      } else {
          echo json_encode(0);
      } 
    }
  } else {
    echo json_encode(0);
  }
?>