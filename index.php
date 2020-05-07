
<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>


<?php

foreach (getCat() as $cat){

echo $cat['Name'];

}

?>

<?php include 'include/template/footer.php' ?>
