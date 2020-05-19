<?php session_start(); ?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>


<h1 class="text-center">My Profile</h1>

<div class="information block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">My information</div>
      <div class="panel-body">
        name:hawar
      </div>
    </div>
  </div>
</div>

<div class="My-ads block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">My ads</div>
      <div class="panel-body">
        test:ads
      </div>
    </div>
  </div>
</div>

<div class="my-Comments block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">Latest Comments</div>
      <div class="panel-body">
        test:Comments
      </div>
    </div>
  </div>
</div>


<?php include 'include/template/footer.php' ?>
