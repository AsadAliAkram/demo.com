<?php

include_once ("connection.php");
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
<div class="container">
<?php
include_once ("header.php");
?>
</div>
<?php
if (isset($_POST['signin'])) {
  $sql = "SELECT * FROM signup WHERE umail='".$_POST['mail']."' AND 
  upass='".$_POST['pass']."' AND ucat ";


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
      <input name="mail" type="email" /><br />
      
      <label>Password<span class="sin-span">*</span></label><br />
      <input name="pass" type="password" />
      

      <span class="sin-span">* requitred fields</span><br />

      <input name="signin" type="submit" class="sin-sup" value="Log In">

    </form>
    </div>
  </div>



  </div>







</div>
</body>
</html>