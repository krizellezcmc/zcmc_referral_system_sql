<?php
    require_once 'config.php';
    session_start();

     //Select Collection
    $collection = $db->users;

    // if(isset($_POST['email'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $cursor = $collection->find(['email' => $email]);

        $count = $collection->count(['email' => $email]);



        if($count === 1){ 
            foreach($cursor as $user) {
                $email_res = $user['email'];
                $password_res = $user['password'];
                $role = $user['role'];
                $id = $user['_id'];

                if ($email_res == $email && password_verify($password, $password_res)) {
                    $_SESSION['auth'] = 1;
                    $_SESSION['role'] = $role;
                    $_SESSION['userId'] = $id;
                    $_SESSION['hospital'] = $user['hospital'];
                    $_SESSION['name'] = json_encode($user['firstName']." ".$user['lastName']);        
                    
                    echo json_encode(array('res' => 'yes', 'role' => $role));        
                } else {
                    echo json_encode(array('res' => "invalid"));
                }
            }
        } else {
            echo json_encode(array('res' => "no"));
        }
        

?>