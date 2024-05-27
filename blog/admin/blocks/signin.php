<?php
    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";


    if(isset($_GET['sign']) && $_GET['sign']=="out"){
        $url = $_SERVER['PHP_SELF'];
        session_destroy();
        header("location: $url");    
    }

    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check_user_q = "SELECT firstname, lastname FROM users 
                         WHERE email='$email' and password='$password'";
        $result_user =  mysqli_query($conn, $check_user_q);
        if(mysqli_num_rows($result_user) == 1 ){
            $signin = mysqli_fetch_assoc($result_user);
            // print_r($signin);
            $_SESSION['name'] = $signin['firstname'];
            $_SESSION['lastname'] = $signin['lastname'];
        }                  
    }
?>