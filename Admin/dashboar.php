<?php



  session_start();
  if(isset($_SESSION['UserName'])){
    echo 'Welcome ' . $_SESSION['UserName'];
  }
  else {

    header('Location: index.php');
    exit();
  }
 ?>
