<?php
session_start();
include_once ("connection.php");
include_once ("config.php");

$usrid = $_SESSION['u_id'];
?>




<!DOCTYPE html >
<html>
<head>
  <title>DEMO | Cart Page</title>
  <?php
  include_once ("CDN.php");

  ?>
</head>
<body>
  <?php
  if ($_SESSION['u_cat'] == '0' OR $_SESSION['u_cat'] == '1' OR $_SESSION['u_cat'] == '2') {
    include_once ("header-admin.php");
  } else {
    include_once ("header.php");
  } 
  ?>
  <div class="row">
    <div class="container">
      <?php
      if (isset($_GET['action'])) {
        if ($_GET['action'] == "delete") {
          foreach ($_SESSION['shoping-cart'] as $keys => $values) {
            if ($values['item_id'] == $_GET['id']) {
              unset($_SESSION['shoping-cart'][$keys]);
              echo '<script>alert("Item Is Removed")</script>';
              $url='cart-page.php';
              echo '<script>window.location = "'.$url.'";</script>';
              die;
            }
          }
        }
      }
      ?>
      <div>
        <h3>Order Details</h3>
        <table class="table table-bordered">
          <tr>
            <th width="10%">Item Image</th>
            <th width="20%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="10%">Price</th>
            <th width="20%">Total</th>
          </tr>
          <?php
          if(!empty($_SESSION['shoping-cart'])) {
            $total = 0;
            foreach($_SESSION['shoping-cart'] as $keys => $values) {
              ?>
              <tr>
                <td><img style='width:50px;' src='<?php echo $values['item_image']; ?>' /></td>
                <td><?php echo $values['item_name']; ?></td>
                <td><input type="number" value='<?php echo $values['item_quantity'];?>'</td>
                <td><?php echo $values['item_price']; ?></td>
                <td> $ <?php echo ($values['item_price'] * $values['item_quantity']); ?></td>
                <td><a href="cart-page.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
              </tr>
              <?php
              $total = $total + ($values['item_quantity'] * $values['item_price']);
              $discn = $total * (90/100);
              $_SESSION['disc'] = $discn;

            }
            ?>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td colspan="3" align="right"><del>$ <?php echo number_format($total); ?></del></td>
            </tr>
            <tr>
              <td colspan="3" align="right">10% Off Price</td>
              <td colspan="3" align="right">$ <?php echo number_format($discn); ?></td>
            </tr>
            <?php
          }
          ?>
        </table>
        <?php
  

        // if (isset($_POST['checkout'])) {
        //   $sql1 ="INSERT INTO `order` (`user_id`) VALUES ('$usrid')";                
        //   if (!mysqli_query($conn, $sql1))
        //   {
        //     echo("Error description: " . mysqli_error($conn));
        //   }
        //   $last_id = mysqli_insert_id($conn);

// if ($conn->query($sql1) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql1 . "<br>" . $conn->error;
// }
          // foreach($_SESSION['shoping-cart'] as $items) {

          //   $quan = $values['item_quantity'];
          //     $pro_id = $values['item_id'];
              



          // $sql2 ="INSERT INTO `order_items`(`order_id`, `products_id`, `quantity`) 
          // VALUES ($last_id, '$pro_id', '$quan')";
          // if (!mysqli_query($conn, $sql2))
          // {
          //   echo("Error description: " . mysqli_error($conn));
          // }
          // }

// if ($conn->query($sql2) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql2 . "<br>" . $conn->error;
// }
// $query = "INSERT INTO `order` (`user_id`) VALUES ('$usrid');
//           INSERT INTO `order_items`(`order_id`, `products_id`, `quantity`) 
//           VALUES ($last_id,'$pro_id','$quan')"; 
//           var_dump($last_id);
//                 if (!mysqli_multi_query($conn, $query))
//                   {
//                   echo("Error description: " . mysqli_error($conn));
//                   }
//                   if ($conn->query($query) === TRUE) {
//                       echo "New record created successfully";
//                   } else {
//                       echo "Error: " . $query . "<br>" . $conn->error;
//                   }
// $url='index.php';
// echo '<script>window.location = "'.$url.'";</script>';
// die;

        // }
        ?>
        <form method="post" action="charge.php">
          <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="<?php echo $discn; ?>"
          data-billing-address="TRUE"
          data-locale="auto"></script>
          <!-- <input name="checkout" type="submit" value="Check Out" class="btn btn-success" /> -->
        </form>
      </div>
    </div>
  </div>



<!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->


</body>
</html>