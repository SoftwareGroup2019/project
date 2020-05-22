<?php session_start();
$pageTitle='Profile';?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
if(isset($_SESSION['user'])){
$getUser=$con->prepare("SELECT * FROM user WHERE Username=?");
$getUser->execute(array($_SESSION['user']));
$info =$getUser->fetch();

?>


<h1 class="text-center">My Profile</h1>

<div class="information block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">My information</div>
      <div class="panel-body">
        name:<?php echo $info['Username']?><br/>
          Email:<?php echo $info['Email']?><br/>
    FullName:<?php echo $info['FullName']?><br/>
          Register Date:<?php echo $info['Date']?><br/>
            fevourite category:
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


<?php
}else{
  header('Location: login.php');
  exit();
}

 include 'include/template/footer.php' ?>
