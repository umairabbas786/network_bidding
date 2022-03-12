<?php 
    include "includes/header.php";
    unset($_SESSION['user']);
    $_SESSION['logout'] = "Logout Successfully";
    header("location:../index.php");
?>