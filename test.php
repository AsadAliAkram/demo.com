<?php
if (isset($_POST["signin"])) {

  $mail = $_POST['mail'];
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM signup";     
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    if ($row['umail'] == $mail AND $row['upass'] == $pass AND $row['ucat'] == '0') {
      $_SESSION['u_cat'] = $row['ucat'];
      $_SESSION['u_cat'] = true;
      $_SESSION['status'] = 1;

      $url='admin.php';
      echo '<script>window.location = "'.$url.'";</script>';
      die;
    } else {     
      $error = 'Wrong email or password';   
    
    } elseif ($row['umail'] == $mail AND $row['upass'] == $pass AND $row['ucat'] == '1') {
      $_SESSION['u_cat'] = $row['ucat'];
      $_SESSION['u_cat'] = true;
      $_SESSION['status'] = 1;
      
      $url='user.php';
      echo '<script>window.location = "'.$url.'";</script>';
      die;    
    }  else {     
      $error = 'Wrong email or password';   
    }
  }
}
?>