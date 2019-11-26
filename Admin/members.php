<?php
session_start();
$pageTitle = "Dashboard";
if(isset($_SESSION['UserName']))
{
 include 'include/template/header.php';
 include 'include/template/navbar.php';
 include 'conect.php';


$do = isset($_GET['do'])? $_GET['do']: 'manage';


if ($do =='manage')
{

echo "this is manage page";

}
elseif($do=='Edit'){
  ?>
<div class="containe">


  <div class="row">
 <form class="col s9">
   <div class="row">
     <div class="input-field col s6">
       <i class="material-icons prefix">account_circle</i>
       <input id="icon_prefix" type="text" class="validate">
       <label for="icon_prefix">UserName</label>
     </div>
   </div>
</form>
 </div>

   <div class="row">
  <form class="col s9">
    <div class="row">
      <div class="input-field col s9">
        <i class="material-icons prefix">account_circle</i>
        <input id="icon_prefix" type="text" class="validate">
        <label for="icon_prefix">FullName</label>
      </div>
    </div>
</form>
  </div>


        <div class="row">
       <form class="col s9">
         <div class="row">
           <div class="input-field col s9">
             <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row">
     <form class="col s9">
       <div class="row">
         <div class="input-field col s9">
           <i class="material-icons prefix">email</i>
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
              <span class="helper-text" data-error="wrong Email" data-success="right Email">Helper text</span>
            </div>
          </div>
        </form>
      </div>

            <div class="row">
           <form class="col s9">
      <button class="btn waves-effect waves-light" type="submit" name="action">Save
        <i class="material-icons right"></i>
      </button>
  <?php
}





include 'include/template/footer.php';

}

// Reuest end here
else
{
  header('location: index.php');
  exit();
}












 ?>
