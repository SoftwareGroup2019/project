
<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>

<div class="container">
<h1 class="text-center">
<?php
echo str_replace('-','',$_GET['pagename'])
?>
</h1>
<br>
<div class="row">







<?php
 foreach (getitems($_GET['pageid']) as $item)
{

echo '<div class="col-sm-12 col-md-4 col-lg-3">';
echo '<div class="card">';
echo '<img src="layout/img/haha.png" alt="Denim Jeans" style="width:100%">';
echo '<h1>'.$item['Name'].'</h1>';
echo '<p class="price">'.$item['Price'].'</p>';
echo '<a href="#" class="btn btn-primary" type="button">
';
echo 'Read More...';
echo '</a>';
echo '</div>';
echo '</div>';

}
?>
</div>

</div>

<?php include 'include/template/footer.php' ?>
