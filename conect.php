<?php


$dsn="mysql:host=localhost;port=3306;dbname=shop";
$user= "root";
$pass= "";
try {
  $con = new PDO ($dsn ,$user, $pass);
  $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
  echo "Failed to connect" . $e->getMessage();
}







?>
