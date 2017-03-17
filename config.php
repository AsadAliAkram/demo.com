<?php
session_start();
// require_once('Stripe/lib/Stripe.php');
 require_once('Stripe/init.php');






$stripe = array(
  "secret_key"      => "sk_test_goQ3rOYXNAbr51sM55v4H5Tv",
  "publishable_key" => "pk_test_wdYezp3qUH6KXZvTjB9YMnoJ"
);



\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>