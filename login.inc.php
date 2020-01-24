<?php

        if(isset($_POST['login-submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username === "USERNAME") {
                if($password === "PASSWORD") {
                    session_start();
                    $_SESSION['user'] = "admin";
                    header('Location: login.php?status=loginSuccess');
                    exit();
                } else {
                    header('Location login.php?status=loginFail');
                    exit();
                }
            }
        }

?>