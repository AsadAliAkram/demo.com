<?php
session_start();
include_once ("connection.php");
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
  <div class="fluid-container">
    <?php
    if ($_SESSION['u_cat'] == '0' OR $_SESSION['u_cat'] == '1') {
      include_once ("header-admin.php");
    } else {
      include_once ("header.php");
    } 
    ?>
    <?php
    if (isset($_POST['add-to-cart'])) {
      if (isset($_SESSION['shoping-cart'])) {
        $item_array_id = array_column($_SESSION['shoping-cart'], "item_id");
        if (!in_array($_GET['id'] , $item_array_id)) {

          $count = count($_SESSION['shoping-cart']);
          $item_array = array (
            'item_id'     =>  $_GET['id'],
            'item_image'  =>  $_POST['hidden-image'],
            'item_name'     =>  $_POST['hidden-name'],
            'item_price'    =>  $_POST['hidden-price'],
            'item_quantity' =>  $_POST['quantity'],
            );
          $_SESSION['shoping-cart'][$count] = $item_array;
        }
      } 
      else {
        echo '<script>alert("item already added")</script>';
        echo '<script>window.location="index.php"</script>';
      }
    }
    else {
      $item_array = array (
        'item_id'     =>  $_GET['id'],
        'item_image'  =>  $_POST['hidden-image'],
        'item_name'   =>  $_POST['hidden-name'],
        'item_price'    =>  $_POST['hidden-price'],
        'item_quantity' =>  $_POST['quantity'],
        );
      $_SESSION['shoping-cart'][0] = $item_array;
    }
    ?>
    <div class="container">
      <div class="registr-form">
        <div class="row">
          <center><h2>Products</h2></center><hr>
          <?php
          $sql = "SELECT * FROM products";
          $result = mysqli_query($conn, $sql);
          $total = mysqli_num_rows($result);
          $start = 0;
          $limit = 12;
          if (isset($_GET['nid'])) {
            $id = $_GET['nid'];
            $start = ($id-1)*$limit;
          } else {
            $id = 1;
          }
          $page = ceil($total/$limit);
          $sqli = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit"); 
          if (mysqli_num_rows($sqli) > 0) {
            while ($row = mysqli_fetch_array($sqli)) {
              ?>

              <div class="col-sm-3" style="padding: 50px 0px">
                <form method="post" action="product.php?action=add&id=<?php echo $row['pid']; ?>">
                  <div style="height:230px">
                    <center><a href="all-products.php?pid=<?php echo $row["pid"];?>"><img style='width:190px;' src='<?php echo "images/" . $row['pimage']?>' /></a></center>
                  </div>
                  <center><h4><?php echo $row['pname']; ?></h4></center>
                  <center><h4><?php echo $row['pdiscription']; ?></h4></center>
                  <center><h4> $ <?php echo $row['prealprice']; ?></h4></center>
                  <center>
                    <div class="row" style="padding: 0px 30px">
                      <div class="col-sm-4"><h4 style="padding: 10px">Quantity:</h4></div> <div class="col-sm-8"><input name="quantity" type="number" value="1"></div>
                    </div>
                  </center>
                  <input type="hidden" name="hidden-image" value="<?php echo "images/" . $row['pimage']?>">
                  <input type="hidden" name="hidden-name" value="<?php echo $row['pname']; ?>">
                  <input type="hidden" name="hidden-price" value="<?php echo $row['prealprice']; ?>">
                  <center><input type="submit" name="add-to-cart" class="btn btn-success" value="Add to Cart"></center>
                </form> 
              </div>
              <?php
            }
          }
          ?>
          <?php
          ?>
        </div>
      </div>
      <ul class="pagination">
        <?php
        if ($id > 1) {
          ?>
          <li><a href="?nid=<?php echo ($id-1) ;?>">Previous</a></li>
          <?php } ?>
          <?php
          for($i=1 ; $i <= $page ; $i++)
            { ?>    
          <li><a href="?nid=<?php echo $i ;?>"><?php echo $i; ?></a></li>
          <?php } ?>
          <?php
          if ($id != $page) {
            ?>
            <li><a href="?nid=<?php echo ($id+1) ;?>">Next</a></li>
            <?php } ?>
          </ul>
          <?php
          if (isset($_SESSION['u_id'])) { ?>
          <a href="cart-page.php" class="btn btn-default">View Cart<span class='glyphicon glyphicon-shopping-cart'></span></p></script></a>
          <?php
        } else {
          ?>
          <a href="signin.php" class="btn btn-default">View Cart<span class='glyphicon glyphicon-shopping-cart'></span></p></script></a>
          <?php
        }
        ?>
<!-- <form method="post" action="cart-page.php">
<input type="submit" name="checkout"value="CHECK OUT<span class='glyphicon glyphicon-shopping-cart'></span>" onclick="this.form.target='_blank';return true;">
</form> -->
</div>
</div>

</body>
</html>