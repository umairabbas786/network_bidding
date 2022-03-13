<?php 
    include "includes/header.php";
    unset($_SESSION['admin']);
    $_SESSION['logout'] = "Logout Successfully";
    header("location:../index.php");
?>