<?php session_start();
$pageTitle='Show Items';
?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php

$item_id = $_GET['itemid'];

// $item_id = 5;

$stmt = $con->prepare("SELECT items.*,
  categories.Name AS category_name,
  user.UserName
   FROM
    items
   INNER JOIN
   categories
  ON
categories.ID =items.Cat_ID
 INNER JOIN
 user
 ON
 user.UserID = items.Member_ID
    WHERE
    item_ID = ? LIMIT 1");

//execute query
    $stmt->execute(array($item_id));

$count =$stmt->rowCount();
if($count >0){
//fetch the data
    $item=$stmt->fetch();
?>
<h1 class="text-center"><?php echo $item['Name']; ?></h1>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <img class="img-responsive img-thumbnail center-block" src= "layout/img/ptrol.jpg"  alt""/>
    </div>
    <div class ="col-md-9 ">
      <h2>Name: <?php echo $item ['Name']?></h2>
      <p>Description: <?php echo $item ['Description']?></p>
      <ul class= list-unstyled>

      <li>
        <i class="fa fa-calendar fa-fw"></i>
        <span>Added Date</span>: <?php echo $item ['Add_Date']?>
      </li>
      <li>
          <i class="fa fa-money fa-fw"></i>
        <span>Price</span>: $<?php echo $item ['Price']?>
      </li>
      <li>
          <i class="fa fa-building fa-fw"></i>
          <span>Made in </span>:<?php echo $item ['Country_Made']?>
      </li>
      <li>
          <i class="fa fa-tags fa-fw"></i>
        <span>Category</span>:<a href="categories.php?pageid=<?php echo $item['Cat_ID']?>&pagename=<?php echo $item['category_name']; ?>">

          <?php echo $item['category_name']?>

        </a>


      </li>
      <li>
        <i class="fa fa-user fa-fw"></i>

        <span>Added By</span>:  <a href= "#"><?php echo $item ['UserName']?></a>
      </li>
</ul>
      </div>
      <hr class= "custom-hr">
      <div class="row">

          <div class="col-md-3">
                UserImage
            </div>
            </div>
            <div class="col-md-9">
                  Usercomment
       </div>
    </div>
<?php

} else {

  echo'There\'s no such ID';
}

 include 'include/template/footer.php'
  ?>
