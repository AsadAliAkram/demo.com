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






<div class="container">
  
   <div class="row">
  	
  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
  	  
  	  <h2>Sigan Up Form</h2>
  	  
  	  <form mathod="post">
  	    
  	    <div>
  	      <input name="fname" type="text" placeholder="Enter First Name" require />
  	      <input name="lname" type="text" placeholder="Enter Last Name" require />
  	      <input name="mail" type="email" placeholder="Enter Your Email" required />
  	      <input name="pas" type="password" placeholder="Enter Your Password" required />

  	    </div>

  	    <div>
  	      <input name="submit" type="submit" value="SUBMIT" />
  	    </div>

  	  </form>
  	
  	</div>

  </div>

</div>

</body>
</html>