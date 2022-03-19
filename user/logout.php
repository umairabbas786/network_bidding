<?php 
    include "includes/header.php";
    unset($_SESSION['user']);
    unset($_COOKIE['email']);
    $_SESSION['logout'] = "Logout Successfully";
    header("location:../index.php");
?>