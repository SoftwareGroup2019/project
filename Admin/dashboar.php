<?php
  session_start();
  $pageTitle = "Dashboard";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
   include 'conect.php';
   $stmt2 = $con->prepare("SELECT COUNT(UserID) FROM user");
   $stmt2->execute();


?>
<div class=" Home-stats">
<div class="container center">
  <h1>Dashboard</h1>
  <div class="row">
<div class="col s12 l3" style="margin-bottom:10px;">
      <div class="stat st-members">
        total members
        <span><a href="members.php"><?php echo checkItem("GrupID", "user" , 0) ?></a></span>
      </div>
    </div>
     <div class="col s12 l3"  style="margin-bottom:10px;">
      <div class="stat st-pending">
        pending members
          <span>
            <a href="members.php">
<?php echo checkItem("RegStatus", "user" , 0) ?>
          </a>
        </spam>
      </div>
    </div>
    <div class="col s12 l3"  style="margin-bottom:10px;">
      <div class="stat st-items">
        total items
        <a href="item.php">
  <span><?php echo countItems('item_ID','items')?></span>
        </a>

      </div>
        </div>
        <div class="col s12 l3"  style="margin-bottom:10px;">
          <div class="stat st-comments">
            total comments
            <a href="comments.php">
  <span><?php echo countItems('c_id','comments');?></span>
            </a>

          </div>
        </div>
  </div>
</div>
</div>


<?php
     include 'include/template/footer.php';
  }
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
