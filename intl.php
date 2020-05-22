
<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>




<?php

// //Error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$sessionUser = '';
if(isset($_SESSION['user'])){
  $sessionUser = $_SESSION['user'];
}

?>




<?php include 'include/template/footer.php' ?>
