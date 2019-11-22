<?php



sessinon_start();
if (isset($_SESSION['USERNAME '])){

include 'init.php';
$do= isset($_GET['do'])?$_GET['do']: 'manage';


if ($d0 =='Manage'){


}elseif($do=='Edit'){
  echo 'welcome To Edit page'

}


include $tp1 .'footer.php'.$_GET['userid'];



}else {
  header('location: index.php');
  exit();
}












 ?>
