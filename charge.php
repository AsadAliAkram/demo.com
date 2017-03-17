<?php
session_start();

include_once ("connection.php");
  require_once('config.php');
$dis = $_SESSION['disc'];
  // require_once('Stripe/lib/Stripe.php');

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => 'customer@example.com',
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $dis,
      'currency' => 'PKR'
  ));

  echo "Successfully charged $" .$dis;

// // Set your secret key: remember to change this to your live secret key in production
// // See your keys here: https://dashboard.stripe.com/account/apikeys
// \Stripe\Stripe::setApiKey("sk_test_goQ3rOYXNAbr51sM55v4H5Tv");

// // Token is created using Stripe.js or Checkout!
// // Get the payment token submitted by the form:
// $token = $_POST['stripeToken'];

// // Charge the user's card:
// $charge = \Stripe\Charge::create(array(
//   "amount" => 1000,
//   "currency" => "usd",
//   "description" => "Example charge",
//   "source" => $token
// ));

  $sql1 ="INSERT INTO `order` (`user_id`) VALUES ('$usrid')";                
  if (!mysqli_query($conn, $sql1))
  {
    echo("Error description: " . mysqli_error($conn));
  }
  $last_id = mysqli_insert_id($conn);
  foreach($_SESSION['shoping-cart'] as $items) {

    $quan = $values['item_quantity'];
    $pro_id = $values['item_id'];

    $sql2 ="INSERT INTO `order_items`(`order_id`, `products_id`, `quantity`) 
    VALUES ($last_id, '$pro_id', '$quan')";
    if (!mysqli_query($conn, $sql2))
    {
      echo("Error description: " . mysqli_error($conn));
    }
  }
  unset($_SESSION['shoping-cart']);
  $url='index.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
?>