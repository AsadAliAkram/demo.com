<?php
session_start();
include_once ("connection.php");
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
if ($_SESSION['u_cat'] == '0' OR $_SESSION['u_cat'] == '1') {
            include_once ("header-admin.php");
        } else {
          include_once ("header.php");
        } 
?>



<div class="container">
  <div class="row">
  <div class="col-sm-6">
    <div class="pro_pic" style="width:100%">
      <?php
      $uid = $_SESSION['u_id'];
      if (isset($_GET['pid'])) {
        $pid=$_GET['pid']; 
        $sql = "SELECT * FROM products WHERE pid=$pid";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

          $GLOBALS['poid'] = $row['pownid'];
          $poid = $GLOBALS['poid'];

          echo "<img style='width:100%' src='images/".$row['pimage']."' />";
          ?>
        </div>
      </div>
      <div class="col-sm-6">
        <h3>PRODUCT:         <?php echo $row['pname']; ?>  </h3>
        <h4>CATEGORY:        <?php echo $row['pcategory']; ?>  </h4>
        <h4>PRICE:           <?php echo $row['prealprice']; ?>  </h4>
        <h4>DISCOUNT PRICE:  <?php echo $row['pdiscountprice']; ?>  </h4>
        <a href="cart-page.php?cid=<?php echo $row['pid']; ?>" class="btn btn-warning">add to cart</a>
        <?php
      }
      ?>
    </div>
  </div>
<div class="row">
 <?php



$qre = "SELECT signup.ufname, reviews.preview, signup.uimage
FROM signup
INNER JOIN reviews
ON signup.uid=reviews.uid
WHERE pid = $pid";

  $resul = mysqli_query($conn, $qre);
  while ($ro = mysqli_fetch_array($resul)) {
    
    ?>
    <div class="review">
      <div class="row">
        <div class="col-sm-1">
<?php
 echo "<img style='width:100%' src='images/".$ro['uimage']."' />";
 echo $ro['ufname'];
?>
        </div>

       
        <div class="col-sm-11">
          <p><?php echo $ro['preview']; ?></p>
        </div>
        </div>
      </div>

      <?php
    }
  }
?>
</div>
</body>
</html>


