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


 ?>
