<?php

    $host_name = "localhost";
    $user_name = "USERNAME";
    $password = "PASSWORD";
    $asmrdb = "PressCorps";

    $conn = mysqli_connect($host_name, $user_name, $password, $asmrdb);

    if (!$conn) {
        die("Connection to PacificMUN ASMR Database failed with error message: " . mysqli_connect_error());
    }
?>