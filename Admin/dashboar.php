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
<div class="col m3">
      <div class="stat st-members">
        total members
        <span><a href="members.php"><?php echo countItems('UserID','user')?></a></span>
      </div>
    </div>
     <div class="col m3">
      <div class="stat st-pending">
        pending members
          <span><a href="members.php?do=Manage&Page=pending">25</a></spam>
      </div>
    </div>
    <div class="col m3">
      <div class="stat st-items">
        total items
          <span>1500</span>
      </div>
        </div>
        <div class="col m3">
          <div class="stat st-comments">
            total comments
              <span>3500</span>
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
