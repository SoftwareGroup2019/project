<?php include 'include/template/header.php';?>
<?php  include 'conect.php'; ?>

<?php

if (isset($_POST['ok'])) {
  // code...
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['UserName'];
    $password = $_POST['Password'];
    echo $username . ' ' . $password;
  }

}


 ?>
<div class="z-depth-2 login-div">
  <div class="row ">
<div class="col s12 ">
  <h5 > Sign in <h5>
  <h6 >Welcome Admin to Panel</h6>
</div>

  </div>
  <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">


<div class="row">
  <div class="input-field col s12">

<input id ="text-input" type="text" class="validate" name="UserName">
<label for ="text-input"> UserName </label>
</div>
</div>

<div class="row">
  <div class="input-field col s12">
<input id ="Password-input" type="Password" class="validate" name="Password">
<label for ="Password-input"> Password </label>

</div>
</div>

<div class="row right">
  <button class="waves-effect waves-light btn" name="ok"><i class="material-icons right">send</i>Signin</button>
</div>
</div>
</div>
  </form>
</div>

<?php include 'include/template/footer.php' ?>
