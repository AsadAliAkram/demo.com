<?php
session_start();
include_once ("connection.php");
?>

<?php
if ($_SESSION['u_cat'] == NULL) {
  $url='index.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
} 
?>

<?php
if (isset($_POST['signout'])){

  session_unset(); 
  session_destroy(); 

  $url='index.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
}
?>
<!DOCTYPE html >
<html>
<head>
  <title>DEMO | Edit Profile</title>
  <?php
  include_once ("CDN.php");
  ?>
</head>
<body>

    <?php
  include_once ("header-admin.php");
?>


<div class="container">
  <?php
      $uid = $_SESSION['u_id'];

  if(isset($_POST['editpro'])) { 
    $targate = "images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    $ufname = $_POST['fname'];
    $ulname = $_POST['lname'];
    $umname = $_POST['mname'];
    $umail = $_POST['mail'];
    $upass = $_POST['pass'];



    $sql = "UPDATE signup SET ufname = '$ufname' , ulname = '$ulname' ,
    umname = '$umname' , umail = '$umail' , upass= '$upass' , 
    uimage = '$image' WHERE uid = '$uid' ";
    if (mysqli_query($conn, $sql)) {
      echo "New record created";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targate)) {
      $msg = " And Image Is Uploaded successfully";
    } else {
      $msg = " And Image Is Not Uploaded";
    } 
    echo $msg;
  }
  ?>


    <?php 
        $sqlq = "SELECT * FROM signup WHERE uid = '$uid' ";
        $result = mysqli_query($conn, $sqlq);
        while ($row = mysqli_fetch_array($result)) {
          
          ?>


  <center><h3>Edit Your Profile</h3></center><hr>
  <div class="registr-form center-block" style="width:50%; margin:0 auto;">
    <center><h4>YOUR INFORMATION</h4></center><hr>
    <form method="post" action="edit-profile.php" enctype="multipart/form-data" />     

    <div class="row">      
      <div class="col-sm-12">
        <label>Your First Name<span class="sin-span">*</span></label><br />
        <input name="fname" type="text" value="<?php echo $row['ufname']; ?>" required />
      </div>
       <div class="col-sm-12">
        <label>Your Last Name<span class="sin-span">*</span></label><br />
        <input name="lname" type="text" value="<?php echo $row['ulname']; ?>"  required />
      </div>
      <div class="col-sm-12">
        <label>Your Midle Name<span class="sin-span">*</span></label><br />
        <input name="mname" type="text" value="<?php echo $row['umname']; ?>" required />
      </div>
      <div class="col-sm-12">
        <label>Your Email<span class="sin-span">*</span></label><br />
        <input name="mail" style="width:100%" type="mail" value="<?php echo $row['umail']; ?>" required />
      </div>
      <div class="col-sm-12">
        <label>Your Password<span class="sin-span">*</span></label><br />
        <input name="pass" type="password" value="<?php echo $row['upass']; ?>" required />
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="pro_pic" style="width:10px">
          <input style="float:left" name="image" value="<?php echo $row['uimage']; ?>" type="file" required />
        </div>
      </div>
      <div class="col-sm-6">
        <input name="editpro" type="submit" class="sin-sup" value="Submit">
      </div>
    </div>
  </form>
</div>

      <?php  }  ?>


</div>










</body>
</html>