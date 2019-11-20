<?php
function getTitl(){
global $pageTitle;
if ( isset ($pageTitle)){
echo $pageTitle;
}else {
echo "Default";
}
}


 ?>
