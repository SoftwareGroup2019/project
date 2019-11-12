<?php


$dsn='mysql:host=localhost;dbname=shop';
$user= 'root';
$pass= '';
$option= array (
PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8';



);
try {
  $con = new PDO ($dsn , $pass, $option);
  $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Cnnection success ';

}
catch(PDOException $e){
  echo 'Failed to connect' . $e->getMessage();
}







?>
