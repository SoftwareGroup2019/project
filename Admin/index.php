<?php
  session_start();
$pageTitle = "Login";

  if(isset($_SESSION['UserName'])){
    header('Location: dashboar.php'); // lo chuna naw dashbord page
  }
 ?>
<?php include 'include/template/header.php';?>
<?php  include 'conect.php'; ?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['UserName'];
    $password = $_POST['Password'];
    $hashedPass =sha1($password);
  //  echo $hashedPass; lo away bzanyn passwordakaman tawawa
  // sha1() bakar det lo tek dany passwordakaman
    $stmt = $con->prepare("SELECT
    UserID,  UserName, Password
      FROM user
       WHERE UserName = ? AND Password = ? And GrupID = 1
Limit  1");
    $stmt->execute(array($username,$hashedPass));
    $row=$stmt->fetch();
    $count =$stmt->rowCount();
    //echo $count; agar count =1 mabasty awaya aw usera daxl kraya
    // la database
     if($count > 0){
       $_SESSION['UserName'] = $username;
       $_SESSION['ID'] =$row['UserID'];
       header('Location: dashboar.php'); // lo chuna naw dashbord page
       exit();
     }

  }

 ?>
<div class="container">

<div class="row">

<div class="col s12 m4 l2"></div>

<div class="z-depth-2 center col s12 m4 l8" id="log">

  <h5 > Sign in <h5>
  <h6 >Welcome Admin to Panel</h6>

<form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<div class="row">

  <div class="input-field col s12">
     <i class="material-icons prefix">account_circle</i>
  <input id ="icon_prefix" type="text" class="validate" name="UserName">
  <label for="icon_prefix"> UserName </label>
  </div>


  <div class="input-field col s12">
    <i class="material-icons prefix">lock</i>
  <input id ="icon_telephone" type="Password" class="validate" name="Password">
  <label for ="icon_telephone"> Password </label>
  </div>

</div>

<button class="waves-effect waves-light btn" name="ok">
  <i class="material-icons right">
    send
  </i>
  Signin
</button>

</form>


</div>

  <div class="col s12 m4 l2"></div>

</div>

<div class="row">

         <div class="col s12 center">

             <h5 id="ghost"></h5>

         </div>

     </div>

</div>




<?php include 'include/template/footer.php' ?>
