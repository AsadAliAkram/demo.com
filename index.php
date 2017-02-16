<?php

include_once ("connection.php");



?>

<!DOCTYPE html >
<html>
<head>


<title>Demo Profect | Home</title>

<?php
include_once ("CDN.php");
?>

</head>
<body>

<div class="container">
  <div class="row">
  	
  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  	  <h2>LOGO</h2>
  	</div>

  	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-right">
  	  
  	  <h2>Header Manue Navebar</h2>
  	  
  	  <form mathod="post" action="signup.php">
  	    
  	    <div>
  	      <input name="mail" type="email" placeholder="Enter Your Email" required />
  	      <input name="pas" type="password" placeholder="Enter Your Password" required />
  	    </div>

  	    <div>
  	      <input name="submit" type="submit" value="SIGN IN">
  	      <a class="btn" href="signup.php" target="_blank">SIGN UP</a>
  	    </div>
  	  </form>
  	
  	</div>

  </div>

</div>



</body>
</html>