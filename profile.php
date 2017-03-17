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
  <title>DEMO | Profile</title>
  <?php
  include_once ("CDN.php");
  ?>
</head>
<body>

<?php
  include_once ("header-admin.php");
?>
        <div class="container">
    
  <div class="row">
    <div class="col-sm-12">
      <a href="edit-profile.php"><h5>EDIT PROFILE</h5></a>
      <div class="pro_pic" style="width:200px">
        <?php
        $uid = $_SESSION['u_id'];
        $sql = "SELECT * FROM signup WHERE uid = '$uid'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {


        echo "<img style='width:100%' src='images/".$row['uimage']."' />";
        ?>
        <h3>  <?php echo $row['ufname']." ".$row['ulname']; ?>  </h3>
        <h4>  <?php echo $row['umail']; ?>  </h4>

        <?php
        }
        ?>



      </div>
    </div>
  </div>
</div>

</body>
</html>