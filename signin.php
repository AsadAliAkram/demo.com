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
  <title>DEMO | Sign Up</title>
  <?php
  include_once ("CDN.php");
  ?>
</head>
<body>

  <?php
  include_once ("header.php");
  ?>

  <?php
  if (isset($_POST["signin"])) {

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM signup";     

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {

      if ($row['umail'] == $mail AND $row['upass'] == $pass AND $row['ustatus'] == '1'  AND ($row['ucat'] == '0' OR $row['ucat'] == '2')) {
        // $_SESSION['u_cat'] = $mail;
        $_SESSION['u_cat'] = $row['ucat'];
        $_SESSION['u_id'] = $row['uid'];

        $url='admin.php';
        echo '<script>window.location = "'.$url.'";</script>';
        die;

      } elseif ($row['umail'] == $mail AND $row['upass'] == $pass AND $row['ucat'] == '1' AND $row['ustatus'] == '1') {
        // $_SESSION['u_cat'] = $mail;
        $_SESSION['u_cat'] = $row['ucat'];
        $_SESSION['u_id'] = $row['uid'];

        $url='user.php';
        echo '<script>window.location = "'.$url.'";</script>';
        die;  
      }
    }
  }
  ?>

  <div class="container">
    <h3>Login or Create an Account</h3>
    <div class="registr-form">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h4>New Customer</h4>
          <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple 
            shipping addresses, view and track your orders in your account and more.</p>
            <a class="sin-sup" href="signup.php">Create an Account</a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <form method="post" action="">
              <h4>Register Customer</h4>
              <p>If you have an account with us, please log in.</p>
              <label>Email Address<span class="sin-span">*</span></label><br />
              <input name="mail" type="email" required/><br /> 
              <label>Password<span class="sin-span">*</span></label><br />
              <input name="pass" type="password" required/>
              <span class="sin-span">* requitred fields</span><br />
              <input name="signin" type="submit" class="sin-sup" value="Log In">
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>