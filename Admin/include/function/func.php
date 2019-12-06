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
echo "<div class='alert alert-danger'>$errormsg</div>";
echo "<div class='alert alert-info'>you will Re Redirected to Homepage After $seconds Seconds.</div>";
header("refresh:$seconds;ur1=index.php");

exit();

}


 ?>
