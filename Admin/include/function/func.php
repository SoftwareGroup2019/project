<?php
function getTitl(){
global $pageTitle;
if ( isset ($pageTitle)){
echo $pageTitle;
}else {
echo "Default";
}
}
//bashe errormsg
function redirectHome($errormsg,$seconds=3){
echo "<div class=''>$errormsg</div>";
echo "<div class=''>you will Re Redirected to Homepage After $seconds Seconds.</div>";
header("refresh:$seconds;url=index.php");

exit();

}
function checkItem($select, $from , $value){
  global $con;

  $statement =$con->prepare("SELECT $select FROM $from WHERE $select = ?");
  $statement->execute(array($value));
  $count = $statement->rowCount();
  return $count;


}


 ?>
