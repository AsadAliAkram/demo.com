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
        <div class="container">
<div class="row">
  <div class="col-sm-6">
    <div class="pro_pic" style="width:100%">
      <?php
      $uct = $_SESSION['u_cat']; 
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
        <?php
      }
      ?>
    </div>
  </div>
 


 <?php

  // $qre = "SELECT * FROM reviews WHERE pid = $pid";

$qre = "SELECT signup.ufname, signup.ulname, reviews.preview, reviews.uid, reviews.rid, signup.uimage
FROM signup
INNER JOIN reviews
ON signup.uid=reviews.uid
WHERE pid = $pid";
  //    $qre = "SELECT  signup.ufname, signup.ulname, signup.uimage, reviews.preview
  // FROM signup
  // FULL OUTER JOIN reviews
  // ON signup.uid=reviews.uid
  // WHERE pid = $pid";

  $resul = mysqli_query($conn, $qre);



  while ($ro = mysqli_fetch_array($resul)) {
    $opr = '';
    if (isset($_GET['opr'])) {
      $opr = $_GET['opr'];

      if ($opr == 'rdel') {
        $rid = $_GET['rid'];
        $sqle = "DELETE FROM reviews WHERE rid=$rid";
        mysqli_query($conn, $sqle);
      }
    }

    ?>


    <div class="review">
      <div class="row">
        <div class="col-sm-1">
      <?php
        echo "<img style='width:100%' src='images/".$ro['uimage']."' />";
        echo $ro['ufname']." ".$ro['ulname'];
      ?>
        </div>
        <div class="col-sm-9">
          <h4 style=""><?php echo $ro['preview']; ?></h4>
        </div>


          
          <?php
          if ($uid == $ro['uid']) {
            
          ?>
          <div class="col-sm-1">

<?php
        if ($eopr == 'redit') {
        $rid = $_GET['rid'];
          if (isset($_POST['edit-review'])) {
            var_dump("expression");
            $edrew = $_POST['ereview'];
             $sqled = "UPDATE reviews SET preview = '$edrew' WHERE  rid='$rid'";
             mysqli_query($conn, $sqled);
          }


      }
?>


<a href="edit-review.php?eopr=redit&pid=<?php echo $pid ;?>&rid=<?php echo $ro["rid"];?>" class="btn btn-info" >EDIT</a>



          </div>
          <div class="col-sm-1">
            <a href="product-user.php?opr=rdel&pid=<?php echo $pid ;?>&rid=<?php echo $ro["rid"];?>" class="btn btn-danger confirmation">Delete</a>
          </div>
          <?php
            } elseif ($uct == '0'){

          ?>
          <div class="col-sm-1">
          </div>
          <div class="col-sm-1">
            <a href="product-user.php?opr=rdel&pid=<?php echo $pid ;?>&rid=<?php echo $ro["rid"];?>" class="btn btn-danger confirmation">Delete</a>
          </div>

          <?php
        }
        ?>



        </div>
      </div>

      <?php
    }
?>


  <?php
  if (isset($_POST['submit-review'])) {
    $reviw = $_POST['review'];
    $date = date("d/m/y : H:i:s", time());
    $sqli = "INSERT INTO reviews(rid, preview, pid, poid, uid, rdate) VALUES ('','$reviw','$pid', '$poid', '$uid', '$date')";
    mysqli_query($conn, $sqli);
  }
  ?>
  <?php

  if ($GLOBALS['poid'] != $uid) {
    ?>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <form method="post" action="">
          <div class="input-group">
            <input name="review" type="text" class="form-control" placeholder="Enter Your Review..." required>
            <div class="input-group-btn">
              <input name="submit-review" class="btn btn-default" id="something" type="submit" value="REVIEW">
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-2"></div>
    </div>
    <?php
  }
}
  ?>

</script>

</div>

</body>
</html>