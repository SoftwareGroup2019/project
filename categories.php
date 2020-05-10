
<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>

<div class="container">
<h1 class="text-center">
<?php
echo str_replace('-','',$_GET['pagename'])
?>
</h1>
<div class="row">
<?php
 foreach (getitems($_GET['pageid']) as $item) {
  echo '<div class="col-sm-6 col-md-4">';
echo '<div class="thumbnail item-bom">';
/*lera rasmakam danaya*/
echo '<img class="" src="haha.png" alt="dddd" />';
echo '<div class="caption">';
echo'<h3>'.$item['Name'].'</h3>';
echo'<p>'.$item['Description'].'</p>';
echo '</div>';
echo '</div>';
echo '</div>';
}
?>
</div>

<?php include 'include/template/footer.php' ?>
