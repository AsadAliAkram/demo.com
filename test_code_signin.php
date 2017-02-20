<?php
if (isset($_POST["signin"])) {
 
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM signup";
      
  $result = mysqli_query($conn, $sql);
  var_dump('query');
  while ($row = mysqli_fetch_array($result)) {
  var_dump('loop');
        echo $row['umail'];
    if ($row['umail'] == $mail AND $row['upass'] == $pass AND $row['ucat'] == '1') {
         
      echo "user";
         
      header('Location: user.php');
       
    } elseif ($row['umail'] == $mail AND $row['upass'] == $pass AND $row['ucat'] == '0') {
         
      echo "Admin";
          
      header('Location: admin.php');
        
    }
      
  }
}
?>