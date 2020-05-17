<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
  session_start();
$pageTitle = "Login";

  if(isset($_SESSION['User'])){
    header('Location: index.php'); // lo chuna naw index page
  }
  ?>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $user = $_POST['Username'];
      $pass = $_POST['password'];
      $hashedPass =sha1($pass);
    //  echo $hashedPass; lo away bzanyn passwordakaman tawawa
    // sha1() bakar det lo tek dany passwordakaman
      $stmt = $con->prepare("SELECT
   UserName, Password
        FROM
        user
         WHERE
          Username = ?
          AND
           password = ? ");
      $stmt->execute(array($user,$hashedPass));

      $count =$stmt->rowCount();
      //echo $count; agar count =1 mabasty awaya aw usera daxl kraya
      // la database
       if($count > 0){
         $_SESSION['user'] = $user;

         header('Location: index.php'); // lo chuna naw dashbord page
        exit();
       }

    }

   ?>

<div class="container Login-page">
  <h1 class="text-center">
  <span class="selected" data-class="login">login</span> |
  <span data-class="signup">signup</span>
  </h1>
  <!--start Login Form -->

  <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div class="input-container">
  <input
   class="form-control"
   type="text"
  name="Username"
  autocmplete="off"
 placeholder="Type your user name"
required />
  </div>
 <div class="input-container">
  <input
   class="form-control"
   type="password"
    name="password"
     autocmplete="new-password"
     placeholder="Type your password"
required
      />
  </div>
    <div class="input-container">
  <input
  class="btn btn-primary btn-block"
  type="submit"
  value="Login"
required
  />
<!--End Login Form -->
<!--start signup Form -->
  </form>
  </div>
  <form class="signup">
<div class="input-container">
  <input
   class="form-control"
   type="text"
  name="Username"
  autocmplete="off"
 placeholder="Type your user name"
required
  />
   </div>
 <div class="input-container">
  <input
   class="form-control"
   type="password"
    name="password"
     autocmplete="new-password"
     placeholder="Type Complex password"
     required />
  </div>
     <div class="input-container">
     <input
      class="form-control"
      type="password"
       name="password2"
        autocmplete="new-password"
        placeholder="Type a password again"
        required />
  </div>
        <div class="input-container">
     <input
      class="form-control"
      type="emali"
       name="emali"
        placeholder="Type a valid email"
        required/>
  </div>
        <div class="input-container">
  <input
  class="btn btn-success btn-block"
  type="submit"
  value="signup"
  required/>
    </div>
  </form>
  <!--End signup Form -->
  </div>





<?php include 'include/template/footer.php' ?>
