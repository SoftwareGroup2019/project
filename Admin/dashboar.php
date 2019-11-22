<?php
  session_start();
  $pageTitle = "Dashboard";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
   include 'conect.php';

   echo $_SESSION['UserName'];
?>




<p>Hello</p>






<?php
     include 'include/template/footer.php';
  }
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
