
<?php session_start();
$pageTitle='Show Items';
?>

<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>

<div class="container">
<h1 class="text-center">
<?php

$cat = $_GET['pagename'];
echo $cat;
?>
</h1>
<br>
<div class="row">

<?php
 foreach (getitems('Cat_ID',$_GET['pageid']) as $item)
{

echo '<div class="col-sm-12 col-md-4 col-lg-3">';
echo '<div class="card">';
echo '<img src="Admin/layout/admin_img/'.$item['Image'].'" alt="Denim Jeans" style="width:100%">';
echo '<h1><a href="items.php?itemid='.$item['item_ID'].'">'.$item['Name'].'</a></h1>';
echo '<p class="price">'.$item['Price'].'</p>';
echo '<div class="data">'.$item['Add_Date'].'</div>';
?>
<a href="items.php?itemid=<?php echo $item['item_ID'];?>" class="btn btn-primary" type="button">
More...
</a>
<?php
echo '</div>';
echo '</div>';

}
?>
</div>

</div>

<?php include 'include/template/footer.php' ?>
