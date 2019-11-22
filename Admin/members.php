<?php
session_start();
  $pageTitle = "Members";
if (!isset($_SESSION['UserName ']))
{
  include 'include/template/header.php';
  include 'include/template/navbar.php';
  include 'conect.php';
$do = isset($_GET['do'])? $_GET['do']: 'manage';


if ($do =='manage')
{

echo "this is manage page";
echo $_SESSION['UserName '];
}
elseif($do=='Edit'){
  echo 'welcome To Edit page';

}





include 'include/template/footer.php';

}

// Reuest end here
else
{
  header('location: index.php');
  exit();
}












 ?>
