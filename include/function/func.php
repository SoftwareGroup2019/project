<?php


function getCat() {

  global $con;

  $getCat = $con->prepare("SELECT * FROM categories ORDER BY ID DESC");

  $getCat->execute();

  $cats = $getCat->fetchALL();

  return $cats;

}



function getTitl(){
global $pageTitle;
if ( isset ($pageTitle)){
echo $pageTitle;
}else {
echo "Default";
}}
//bashe errormsg
function redirectHome($theMsg, $url =null ,$seconds=3){
  if($url === null){
    $nrl='index.php';
    $link='Homepage';
  }
  else{
    if(isset($_SERVER['HTTP_REFERER'])&& $_SERVER['HTTP_REFERER'] !=='')
    {
$link='previous page';
} else {
$url = 'index.php';
$link = 'Homepage';

}}
echo $theMsg;
echo "<div calss='alert alert-info'>You Will Be Rrdirected to Homepage After $seconds seconds .</div>";
header("refresh:$seconds:$url");

exit();

}
function checkItem($select, $from , $value){
  global $con;

  $statement =$con->prepare("SELECT $select FROM $from WHERE $select = ?");
  $statement->execute(array($value));
  $count = $statement->rowCount();
  return $count;


}

 function countItems($item, $table) {
   global $con;
   $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
   $stmt2->execute();
   return $stmt2->fetchColumn();
 }

/*GET ITEMS FUNCTION*/
 function getitems($CatID) {

    global $con;

    $getitems= $con->prepare("SELECT * FROM items WHERE Cat_ID = ? ORDER BY item_ID DESC");

    $getitems->execute(array($CatID));

    $items= $getitems->fetchALL();

    return $items;
 }

?>
