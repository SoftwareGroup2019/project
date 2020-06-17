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
    item_ID = ?
    AND
    Approve = 1");

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
      <?php if (isset($_SESSION['user'])){ ?>
      <!--IStat Add Comment-->
<div class="row">
          <div class="col-md-offset-3">
            <div class="add-comment">
<h3> Add your Comment</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] .'?itemid='.$item['item_ID'] ?> " method="POST">
<textarea name="comment" required></textarea>
<input class= "btn btn-primary" type="Submit" value="Add comment">
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$comment   = $_POST['comment'];
$userid    =$_SESSION['uid'];
$itemid    =$_GET['itemid'];




if(!empty($comment)){

       $stmt= $con->prepare("INSERT INTO
          comments(comment,status,comment_date,item_id,user_id)
          VALUES(:zcomment,1,NOW(),:zitemid,:zuserid)");

          $stmt->execute(array(

             'zcomment'=> $comment,
              'zitemid'=> $itemid,
              'zuserid'=> $userid
          ));
          if($stmt){

             echo'<div class="alert alert-success">CommentAdded</div>';
          }
}
else {
  echo "Please Write something";
}
}
 ?>

             </div>
             </div>
     </div>
<!--End Add Comment-->
<?php } else {
  echo '<a href="login.php">Login </a> or <a href="login.php"> Register </a>To Add Comment';
}?>
        <hr class= "custom-hr">
        <?php
        $stmt = $con->prepare("SELECT
                                      comments.*,  user.Username As Member
                              FROM
                                      comments
                              INNER join

                                      user
                              ON
                                      user.UserID = comments.user_id
                                      WHERE
                                       item_id= ?
                                    AND
                                    status = 1
                                      ORDER BY
                                      c_id DESC
                                      ");

           $stmt->execute(array($item['item_ID']));

           $comments = $stmt->fetchAll();


         ?>

<?php

foreach ($comments as $comment ){ ?>
  <div class="comment-box">
  <div class="row">
  <div class= "col-sm-2 text-center">
  <?php   echo '<img src="layout/img/haha.png" class="rounded-circle" style="width:100%">';  ?>
    <?php echo $comment['Member']?></div>
      <div class= "col-sm-10"></div>
<p class="lead"><?php echo $comment['comment']?></p>
  </div>
  </div>
  <hr class="custom-hr">
 <?php
}

?>




<?php

} else {

  echo'There\'s no such ID Or this item is waiting Approval ';
}

 include 'include/template/footer.php'
  ?>
