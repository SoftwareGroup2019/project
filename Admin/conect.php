<?php


$dsn="mysql:host=localhost;dbname=shop";
$user= "root";
$pass= "";
try {
  $con = new PDO ($dsn ,$user, $pass);
  $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD
  echo "conection done";
=======
  echo 'Cnnection success ';
>>>>>>> f3f6107cb26b3900c6bda2d043a906e37bcb9526

}
catch(PDOException $e){
  echo "Failed to connect" . $e->getMessage();
}







?>
