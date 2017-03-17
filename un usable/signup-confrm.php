  <?php
  session_start();
  include_once ("connection.php");
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


      $_SESSION['fname'] = $_POST['fname'];
      $_SESSION['$lname'] = $_POST['lname'];
      $_SESSION['$mname'] = $_POST['mname'];
      $_SESSION['$mail'] = $_POST['mail'];
      $_SESSION['$pass'] = $_POST['pass'];


    }
    ?>





    <div class="container">
      <h3>Create an Account</h3>
      <div class="registr-form">
       <h4>PERSONAL INFORMATION</h4>
       <form method="post" action="confermation.php">     
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