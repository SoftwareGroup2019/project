
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php  include 'conect.php'; ?>

<?php

include 'init.php';

foreach (getCat()as $cat){

echo $cat['Name'];

}
include $tpl . 'footer.php';

<?php include 'include/template/footer.php' ?>
?>
