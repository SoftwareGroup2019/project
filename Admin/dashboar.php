<?php
  session_start();
  $pageTitle = "Dashboard";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
   include 'conect.php';

?>
<div class=" Home-stats">
<div class="container center">
  <h1>Dashboard</h1>
  <div class="row">
<div class="col-md-3">
      <div class="stat">
        total members
        <span>200</span>
      </div>
    </div>
     <div class="col-md-3">
      <div class="stat">
        pending members
          <span>25</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat">
        total items
          <span>1500</span>
      </div>
        </div>
        <div class="col-md-3">
          <div class="stat">
            total comments
              <span>3500</span>
          </div>
        </div>
  </div>
</div>
</div>
<div class-"latest">
<div class="container center">
<div class="row">
 <div class="col-ms-6">
  <div class="panel panel-default">
    <div class="panel-heading">
    <i class="fa fa-users" ></i>latest Registerd Users
  </div>
  <div class="panel-body">
    test
  </div>
  </div>
</div>
<div class-"latest">
<div class="container center">
<div class="row">
 <div class="col-ms-6">
  <div class="panel panel-default">
    <div class="panel-heading">
    <i class="fa fa-tag" ></i>latest items
  </div>
  <div class="panel-body">
    test
  </div>
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
