<?php



sessinon_start();
if (isset($_SESSION['USERNAME '])){

  include 'include/template/header.php';
  include 'include/template/navbar.php';
  include 'conect.php';
$do= isset($_GET['do'])?$_GET['do']: 'manage';


if ($d0 =='Manage'){


}elseif($do=='Edit'){
  echo 'welcome To Edit page'

}


include 'include/template/footer.php'



}else {
  header('location: index.php');
  exit();
}












 ?>
