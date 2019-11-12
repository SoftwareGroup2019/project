<?php include 'include/template/header.php';?>
<?php  include 'conect.php'; ?>

<?php

echo "kak ayman write the login code here";


 ?>


<div class="z-depth-2 login-div">
  <div class="row ">
<div class="col s12 ">
  <h5 > Sign in <h5>
  <h6 >Welcome Admin to Panel</h6>
</div>

  </div>
  <form class="" action="" method="post">


<div class="row">
  <div class="input-field col s12">

<input id ="text-input" type="text" class="validate">
<label for ="text-input"> UserName </label>
</div>
</div>

<div class="row">
  <div class="input-field col s12">
<input id ="Password-input" type="Password" class="validate">
<label for ="Password-input"> Password </label>

</div>
</div>

<div class="row right">
  <a class="waves-effect waves-light btn"><i class="material-icons right">send</i>Signin</a>
</div>
</div>
</div>
  </form>
</div>

<?php include 'include/template/footer.php' ?>
