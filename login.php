<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
  session_start();
$pageTitle = "Login";

  if(isset($_SESSION['Username'])){
    header('Location: index.php'); // lo chuna naw index page
  }
  ?>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $user = $_POST['Username'];
      $pass = $_POST['password'];
      $hashedPass =sha1($pass);

     ///////// Login Error Check/////////////////////////////////
     ///////////////////////////////////////////////////////////
      $formErrors=array();
      if(strlen($user)<4){
        $formErrors[]= 'Username Must Be Larger Than 4 Character ';
      }
      if(empty($user)){
        $formErrors[]= 'Username Must Not Be Empty ';
      }
      if(empty($pass)){
        $formErrors[]= 'Password Must Not Be Empty ';
      }
      //////////////////////////////////////////////////////
    //////// Login Error Check//////////////////////////////

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

else{

////// Signup Error Check///////////////////////////////////////////
// echo "test";
// if(isset($_POST['password1']) && isset($_POST['password2'])){
// $pass1 =  sha1($_POST['password'] );
// $pass2 =  sha1($_POST['password2'] );
// if($pass1 !== $pass2){
//   $formErrors[] ='Sorry password Is Not Match';
// }
//
// }
/////////// Signup Error Check//////////////////////////////////////


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
 />
  </div>
 <div class="input-container">
  <input
   class="form-control"
   type="password"
    name="password"
     autocmplete="new-password"
     placeholder="Type your password"

      />
  </div>

    <div class="input-container">
      <input
      class="btn btn-primary btn-block"
      type="submit"
      value="Login"
      />
</div>

</form>
<!--End Login Form -->


<!--start signup Form -->
  <form class="signup">
<div class="input-container">
  <input
   class="form-control"
   type="text"
  name="Username"
  autocmplete="off"
 placeholder="Type your user name"
  />
   </div>
 <div class="input-container">
  <input
   class="form-control"
   type="password"
    name="password1"
     autocmplete="new-password"
     placeholder="Type Complex password"
   />
  </div>
     <div class="input-container">
     <input
      class="form-control"
      type="password"
       name="password2"
        autocmplete="new-password"
        placeholder="Type a password again"
         />
  </div>
        <div class="input-container">
     <input
      class="form-control"
      type="emali"
       name="emali"
        placeholder="Type a valid email"
        />
  </div>
<div class="input-container">
      <input
      class="btn btn-success btn-block"
      name ="signup"
      type="submit"
      value="signup"
      />
</div>
  </form>
  <!-- end pf signup Form -->

  <div class="the-errors text-center">
    <?php
      if(!empty($formErrors)){
      foreach ($formErrors as $error) {
        echo $error . '<br>';
      }
      }   ?>
    </div>

  </div>

<?php include 'include/template/footer.php' ?>
