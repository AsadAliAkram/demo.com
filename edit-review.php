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
  <title>DEMO | Edit Review</title>
  <?php
  include_once ("CDN.php");
  ?>
</head>


<body>
  <?php
  include_once ("header-admin.php");
  ?>
  <div class="container">
    <div class="registr-form">
      <?php
      $eopr = '';
      if (isset($_GET['eopr'])) {
        $eopr = $_GET['eopr'];
        $pid = $_GET['pid'];
        if ($eopr == 'redit') {
          $rid = $_GET['rid'];
          if (isset($_POST['edit-review'])) {
            $edrew = $_POST['ereview'];
            $sql = "UPDATE reviews SET preview = '$edrew' WHERE  rid='$rid'";
            mysqli_query($conn, $sql);
            $url='product-user.php?pid='.$pid;
            echo '<script>window.location = "'.$url.'";</script>';
            die;  
          }
        }
      }
      ?>
      <form method="post" action="">
        <input name="ereview" type="text" />
        <input name="edit-review" type="submit" value="UPDATE" class="btn btn-default">
      </form> 
    </div>
  </div>


</body>
</html>