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
    $stmt = $con->prepare("SELECT UserName, Password FROM user WHERE GrupID = 1 ");
    $stmt->execute(array($username,$hashedPass));
    $count =$stmt->rowCount();
    //echo $count; agar count =1 mabasty awaya aw usera daxl kraya
    // la database
     if($count > 0){
       $_SESSION['UserName'] = $username;
       header('Location: dashboar.php'); // lo chuna naw dashbord page
       exit();
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
