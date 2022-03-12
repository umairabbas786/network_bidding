<?php 
session_start();
ob_start();
include "includes/conn.php";
if(isset($_SESSION['user'])){

}
else{
    header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Home | Number Bidding</title>
<link rel="icon" href="img/logo.png" type="image/png">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
<link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
<link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />
<link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />
<link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />
<link rel="stylesheet" href="vendors/datepicker/date-picker.css" />
<link rel="stylesheet" href="vendors/scroll/scrollable.css" />
<link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />
<link rel="stylesheet" href="vendors/morris/morris.css">
<link rel="stylesheet" href="vendors/material_icon/material-icons.css" />
<link rel="stylesheet" href="css/metisMenu.css">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
</head>
<body class="crm_body_bg">