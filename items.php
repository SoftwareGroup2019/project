<?php session_start();
$pageTitle='Show Items';?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
$item_id = $_GET['itemid'];
$stmt = $con->prepare("SELECT * FROM items WHERE item_ID = ? LIMIT 1");

//execute query
    $stmt->execute(array($item_id));

//fetch the data
    $row=$stmt->fetch();
?>
<h1 class="text-center"><?php echo $item['Name'] ?></h1>
<?php



 include 'include/template/footer.php' ?>
