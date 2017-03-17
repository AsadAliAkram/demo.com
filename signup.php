<?php
session_start();
include_once ("connection.php");

$ucat = $_SESSION['u_cat'];
if ($ucat == 0 AND $ucat == 2) {
  $url='admin.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
} elseif ($ucat == 1) {
  $url='user.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
}


?>

<!DOCTYPE html >
<html>
<head>
  <title>DEMO | Sign In</title>
  <?php
  include_once ("CDN.php");
  ?>
</head>


<body>
  <?php
  include_once ("header.php");
  ?>
</div>


<?php

  
if (isset($_POST['signup'])) {


  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $mname = $_POST['mname'];
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];
  $_SESSION['code'] = rand(1000,9000);
  $cod = $_SESSION['code'];

  $sql = "INSERT INTO signup (uid, ufname, ulname, umname, umail, upass, ucat, uccode, ustatus) VALUE 
  ('NULL','$fname','$lname','$mname','$mail','$pass','1','$cod','0')"; 
  $var = mysqli_query($conn, $sql);


      $url='confermation.php';
      echo '<script>window.location = "'.$url.'";</script>';
      die; 

}
?>





<div class="container">
  <h3>Create an Account</h3>
  <div class="registr-form">
    <h4>PERSONAL INFORMATION</h4>
    <form method="post" action="">     
      <div class="row">      
        <div class="col-lg-2 col-md-2">
          <label>First Name<span class="sin-span">*</span></label><br />
          <input name="fname" type="text" required /><br />
        </div>
        <div class="col-lg-6 col-md-6">
          <label>Last Name<span class="sin-span">*</span></label><br />
          <input name="lname" type="text" required />
        </div>
        <div class="col-lg-2 col-md-2">
        </div>
        <div class="col-lg-2 col-md-2">
          <label>Middle Name<span class="sin-span">*</span></label><br />
          <input name="mname" type="text" required />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label>Email Adress<span class="sin-span">*</span></label><br />
          <input name = "mail" type="email" required />
        </div>
        <div class="col-md-6">
          <label>Password<span class="sin-span">*</span></label><br />
          <input name = "pass" type="password" required />
        </div>
      </div>

      <span class="sin-span">* requitred fields</span><br />
      <input name="signup" type="submit" class="sin-sup" value="Submit">
    </form>
  </div>
</div>
</body>
</html>