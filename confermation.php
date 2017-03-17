<?php
session_start();
  include_once ("connection.php");


$ucat = $_SESSION['u_cat'];
  if ($ucat == 0 AND $ucat == 2) {
  $url='admin.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
} elseif ($ucat == 1) {
  $url='user.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
}

  ?>

  <!DOCTYPE html >
  <html>
  <head>
    <title>DEMO | Confermation</title>
    <?php
    include_once ("CDN.php");
    ?>
  </head>


  <body>
      <?php
      include_once ("header.php");
      ?>
    </div>



<?php
$cod = $_SESSION['code'];

if (isset($_POST['sinup'])) {
    $code = $_POST['confermation-code'];
      if ($cod == $code) {

    $sqlq = "UPDATE signup SET ustatus = '1' WHERE uccode = $code ";
    mysqli_query($conn, $sqlq);
  }
      $url='signin.php';
      echo '<script>window.location = "'.$url.'";</script>';
      die;  
}
?>

    <div class="container">
      <h3>This is your Confermation Code</h3>
        <h4><b><?php echo $cod; ?></b></h4>
      <p>Copy this code and enter in field. Than press DONE.</p>
      <form method="post" action="">
        <input name="confermation-code" type="text" placeholder="enter above mention code" required />
        <input name="sinup" type="submit" value="DONE" class="btn btn-default" >

      </form>
      
  </div>
</body>
</html>