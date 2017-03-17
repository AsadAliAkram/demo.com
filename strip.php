<?php
include_once ("config.php");
?>

        <form method="post" action="charge.php">
          <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>
          <!-- <input name="checkout" type="submit" value="Check Out" class="btn btn-success" /> -->
        </form>