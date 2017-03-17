<?php
session_start();
include_once ("connection.php");
$aid = $_SESSION['u_id'];
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
  <title>DEMO | A Dash Bord</title>
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
          <?php
          
          $sql = "SELECT * FROM signup WHERE uid = '$aid'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
            $fname = $row['ufname'];
            $lname = $row['ulname'];
            ?>

            <h4><?php echo $fname." ".$lname; ?></h4>
            <?php
          }
          ?>
        </div>
        <div class="col-sm-6">
         
        </div>
      </div>


      <div class="registr-form">
        <div class="row">
          <center><h2>Products</h2></center><hr> 
          <?php
          $aid = $_SESSION['u_id'];
          $cat = $_SESSION['u_cat'];
            if ($cat == 2) {
            $sql = "SELECT * FROM products";
          }elseif ($cat == 0) {
            $sql = "SELECT * FROM products WHERE pownid = '$aid' ";
          }


          

          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-sm-3"  style="margin-bottom:50px">
              <div style="height:350px">
              <?php
              $dprice = $row['prealprice']*(90/100) ;
              ?>
              <center><a href="product-user.php?pid=<?php echo $row["pid"];?>"><img style='width:190px; ' src='<?php echo "images/" . $row['pimage']?>' /></a></center>
              <center><h3><?php echo $row['pname']; ?></h3></center>
              <center><p><?php echo  $row['pdiscription']; ?></p></center>
              <center><del><p><?php echo  $row['prealprice']."/= Rs"; ?></p></del></center>
              <center><p><?php echo  $dprice."/= Rs"; ?></p></center>
              </div>
                <?php
                    $did = '';
                  if (isset($_GET['did'])) {
                     $did = $_GET['did'];
                     if ($did == 'delet') {
                      $pid = $_GET['pid'];
                     $sqle = "DELETE FROM products WHERE pid=$pid";
                     mysqli_query($conn, $sqle);
                     }
                   } 
                   ?>
                <?php
                if ($cat == 2) {
                    ?>  
                 <center> <a href="admin.php?did=delet&pid=<?php echo $row['pid'];?>" class="btn btn-danger" >DELETE</a></center>

               <?php } ?>
            </div>
            <?php
          }
          ?>
        </div>

        <a href="create-product.php" class="btn btn-default"><h4>Create Product</h4></a>

      </div>

  





    </div>
</body>
</html>