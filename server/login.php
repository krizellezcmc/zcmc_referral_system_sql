<?php
    require_once 'config.php';
    session_start();

    if(isset($_POST['email'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if(mysqli_num_rows($result) > 0) {
            while($user = $result->fetch_assoc()) {
                if(password_verify($password, $user['password'])) {
                    $role = $user['role'];
                    $id = $user['userId'];
                    $hospitalId = $user['FK_hospitalId'];
    
                    $_SESSION['auth'] = 1;
                    $_SESSION['role'] = $role;
                    $_SESSION['userId'] = $id; 
                    $_SESSION['hospitalId'] = $hospitalId;
                    $_SESSION['name'] = json_encode($user['firstName']." ".$user['lastName']); 

                    echo json_encode(array('res' => 'yes', 'role' => $role));      
                } else {
                    echo json_encode(array('res' => "wrong pass"));
                } 
            
            }
            
        } else {
            echo json_encode(array('res' => "no email"));
        }
    }
?>