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
  <title>DEMO | Product</title>
  <?php
  include_once ("CDN.php");
  ?>
</head>
<body>

    <?php
  include_once ("header-admin.php");
?>



<div class="row">
  <div class="col-sm-8">
    <div class="pro_pic" style="width:400px">
      <?php
      $uid = $_SESSION['u_id'];
      if (isset($_GET['pid'])) {
        $pid=$_GET['pid']; 
        $sql = "SELECT * FROM products WHERE pid=$pid";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

$GLOBALS['poid'] = $row['pownid'];

          echo "<img style='width:100%' src='images/".$row['pimage']."' />";
          ?>
        </div>
      </div>
      <div class="col-sm-4">
        <h3>  <?php echo $row['pname']; ?>  </h3>
        <h4>  <?php echo $row['pcategory']; ?>  </h4>
        <?php
      }
      ?>
    </div>
  </div>
      <?php
} 
  ?>


 <?php
  $qre = "SELECT * FROM reviews WHERE pid = $pid";
  $resul = mysqli_query($conn, $qre);
  while ($ro = mysqli_fetch_array($resul)) {
    $opr = '';
    if (isset($_GET['opr'])) {
      $opr = $_GET['opr'];

      if ($opr == 'rdel') {
        $rid = $_GET['rid'];
        $sqle = "DELETE FROM reviews WHERE rid = $rid";
        mysqli_query($conn, $sqle);
      }
    }
    ?>
    <script type="text/javascript">
    $('.confirmation').on('click', function () {
      return confirm('Are you sure?');
    });
    </script>

    <div class="review">
      <div class="row">
        <div class="col-sm-10">
          <h4 style=""><?php echo $ro['preview']; ?></h4>
        </div>


          <div class="col-sm-1">
          </div>
          <div class="col-sm-1">
            <a href="product-user.php?opr=rdel&pid=<?php echo $pid ;?>&rid=<?php echo $ro["rid"];?>" class="btn btn-danger confirmation">Delete</a>
          </div>

        </div>
      </div>

      <?php
    }
?>


  <?php
  if (isset($_POST['submit-review'])) {
    $reviw = $_POST['review'];
    $date = date("d/m/y : H:i:s", time());
    $sqli = "INSERT INTO reviews(rid, preview, pid, uid, rdate) VALUES ('','$reviw','$pid','$uid', '$date')";
    mysqli_query($conn, $sqli);
  }
  ?>
  <?php
  $qre = "SELECT * FROM reviews WHERE pid = $pid";
  $resul = mysqli_query($conn, $qre);
  while ($ro = mysqli_fetch_array($resul)) {
    ?>
    <h4 style=""><?php echo $ro['preview']; ?></h4>
    <?php

}
?>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form method="post" action="">
      <div class="input-group">
        <input name="review" type="text" class="form-control" placeholder="Enter Your Review...">
        <div class="input-group-btn">
          <input name="submit-review" class="btn btn-default" type="submit" value="REVIEW">
        </div>
      </div>
    </form>
  </div>
  <div class="col-sm-2"></div>
</div>




</div>

</body>
</html>