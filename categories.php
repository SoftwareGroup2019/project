
<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>

<div class="container">
<h1 class="text-center">
<?php
echo str_replace('-','',$_GET['pagename'])
?>
</h1>
<?php
 foreach (getitems($_GET['pageid']) as $item) {
  echo $item ['Name'];
}
?>
</div>

<?php include 'include/template/footer.php' ?>
