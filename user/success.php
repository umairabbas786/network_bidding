<?php include "includes/header.php";?>
<?php include "includes/sidenav.php";?>
<?php include "includes/topnav.php";?>
<!--Main Work-->

<?php 
    if(isset($_POST['email'])){
    $row = GetUserWithEmail($_POST['email'],$conn);
    if(Deposit($row['id'],$_POST['amount'],$conn) == true){
?>
<style>
      body {
        text-align: center;
      }
        h1 {
          color: #6C63FF;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #6C63FF;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        margin: 0 auto;
      }
    </style>
<div class="main_content_iner ">
    <div class="container-fluid p-0 ">
        <div class="row ">
            <div class="card">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                <i class="checkmark">✓</i>
            </div>
                <h1>Success</h1> 
                <p>Funds Added Successfully</p>
                <a href="index.php">Return to Home</a>
            </div>
        </div>
    </div>
</div>
<?php }}else{header("location:index.php");}?>

<!--Main Work-->
<?php include "includes/footer.php";?>
<?php include "includes/script.php";?>