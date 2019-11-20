<?php
  session_start();
  $pageTitle = "Categoris";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
?>




<h1>This is Ctaegoris page</h1>






<?php
     include 'include/template/footer.php';
  }
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
