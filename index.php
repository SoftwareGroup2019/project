<?php
  ob_start();
  session_start();?>
<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>


<div class="container">

<br>
<div class="row">

<?php


$stmt = $con->prepare("SELECT * FROM items WHERE Approve = 1");

//execute query
   $stmt->execute();

 foreach ( $stmt as $item)
{

echo '<div class="col-sm-12 col-md-4 col-lg-3">';
echo '<div class="card">';
?>
<img src="Admin/layout/admin_img/<?php echo $item['Image']; ?>" alt="Denim Jeans" style="width:100%">
<?php
?>
 <h1> <a href="items.php?itemid=<?php echo $item['item_ID']; ?>"> <?php echo $item['Name']; ?></a> </h1>
<?php
echo '<p class="price">'.$item['Price'].'</p>';
echo '<div class="data">'.$item['Add_Date'].'</div>';
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

<?php include 'include/template/footer.php'

 ?>
