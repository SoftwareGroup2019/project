<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
  session_start();
$pageTitle = "Login";

  if(isset($_SESSION['Username'])){
    header('Location: index.php'); // lo chuna naw index page
  }


  $do = isset($_GET['do'])? $_GET['do']: 'manage';
  ?>

  <?php


  if($do == 'manage') {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){




          $user = $_POST['Username'];
          $pass = $_POST['password'];
          $hashedPass =sha1($pass);


         ///////// Login Error Check /////////////////////////////////

         ///////////////////////////////////////////////////////////
         $formErrors=array();
          $username = $_POST['Username'];
          $password = $_POST['password'];

           if(strlen($user)<4){
             $formErrors[]= 'Username Must Be Larger Than 4 Character ';
           }
           if(empty($user)){
             $formErrors[]= 'Username Must Not Be Empty ';
           }
           if(empty($pass)){
             $formErrors[]= 'Password Must Not Be Empty ';
           }////////////////////////////////////////////////////
        //////// Login Error Check//////////////////////////////

        //  echo $hashedPass; lo away bzanyn passwordakaman tawawa
        // sha1() bakar det lo tek dany passwordakaman
          $stmt = $con->prepare("SELECT
       UserID, UserName, Password
            FROM
            user
             WHERE
              Username = ?
              AND
               password = ? ");
          $stmt->execute(array($user,$hashedPass));
          $get = $stmt->fetch();

          $count =$stmt->rowCount();
          //echo $count; agar count =1 mabasty awaya aw usera daxl kraya
          // la database
           if($count > 0){
             $_SESSION['user'] = $user;
             $_SESSION['uid'] = $get['UserID'];

             header('Location: index.php'); // lo chuna naw dashbord page
            exit();
           }
    }

  }


else if ($do == 'signup') {

    if($_SERVER['REQUEST_METHOD'] == 'POST')

    {



  $user = $_POST['Username'];
  $pass = $_POST['password1'];
  $hashedPass =sha1($pass);
  $email = $_POST['email'];


  $itemiamge = time() . '-' . $_FILES["image"]["name"];
  // For image upload
     $target_dir = "Admin/layout/admin_img/";
     $target_file = $target_dir . basename($itemiamge);

     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
     {

       $time =  date("m/d/Y h:i:s a", time());
         $stmt=$con->prepare("INSERT INTO
                      user(Username,Password,Email,RegStatus,image,Date)
                      VALUES(:zuser,:zpass,:zemail,0,:zimage,$time)");
         //  echo $id . $user . $email . $name;
         // update zanyryakany usery la naw database dakay

         $stmt->execute(array(


           'zuser'=>$user,
           'zpass'=>sha1($pass),
           'zemail'=>$email,
           'zimage'=>$itemiamge


         // zanyary user nuwe daxl dakay baw array dachta naw database

         ));
         $mssgbox = "User Added successfully";
     }
     else
     {

                $stmt=$con->prepare("INSERT INTO
                             user(Username,Password,Email)
                             VALUES(:zuser,:zpass,:zemail)");
                //  echo $id . $user . $email . $name;
                // update zanyryakany usery la naw database dakay

                $stmt->execute(array(
                  'zuser'=>$user,
                  'zpass'=>sha1($pass),
                  'zemail'=>$email
                // zanyary user nuwe daxl dakay baw array dachta naw database
                ));
                $mssgbox = "User Added successfully";
     }



}

}

//
// else{
//
// ////// Signup Error Check///////////////////////////////////////////
// // echo "test";
// // if(isset($_POST['password1']) && isset($_POST['password2'])){
//
// // if(empty($_POST$pass1 !== $pass2)){
// //   $formErrors[] ='Sorry password Cant Be Empty';
//
//
//
// // $pass1 =  sha1($_POST['password'] );
// // $pass2 =  sha1($_POST['password2'] );
// // if($pass1 !== $pass2){
// //   $formErrors[] ='Sorry password Is Not Match';
// // }
// //
// // }
// /////////// Signup Error Check//////////////////////////////////////
// // if(empty$pass1 !== $pass2){
// //   $formErrors[] ='Sorry password Cant Be EMpty';
//
//
// }

// if(isset($email)){
//   $filterdEmail =filter_var($_POST['email'],FLTER_SANIER_SANITZE);
//   if(filter_var($filterdEmail,FILTER_VALIDATE_EMATL)!=True){
//     $formErrors[]='This Email Is Not Valid';
//   }
// }
//
// if (empty($formErrors)){
//
//   $check = checkItem("Username","user", $user);
//   if ($check == 1){
//   echo $user;
//   }
//
//   else {
//
//
// $stmt=$con->prepare("INSERT INTO
//              user(Username ,Password,RegStatus,Date)
//              VALUES(:zuser,:zpass,0,now())");
// //  echo $id . $user . $email . $name;
// // update zanyryakany usery la naw database dakay
// $stmt->execute(array(
//
//
//   'zuser'=>$user,
//   'zpass'=>sha1($pass),
//   // 'zmail'=>$email
//
//
// // zanyary user nuwe daxl dakay baw array dachta naw database
//
// ));
// echo "User Added successfully";
//
//
//  }// end of empty error
//
//
//
// } // end of post insert requst

   ?>



<div class="container Login-page">
  <h1 class="text-center">
  <span class="selected" data-class="login">login</span> |
  <span data-class="signup">signup</span>
  </h1>
  <!--start Login Form -->

  <form class="login" action="login.php" method="post">
<div class="input-container">
  <input
  pattern =".{4,}"
  title="Username Must Be Between 4  Chars"
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
  minlength="4"
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
      />
</div>

</form>
<!--End Login Form -->


<!--start signup Form -->
  <form class="signup" action="login.php?do=signup" method="post" enctype="multipart/form-data">
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
      type="email"
       name="email"
        placeholder="Type a valid email"
        />
  </div>
                  <!-- image -->
                  <div class="input-container">
                    <input type="file" name="image" value="Choose an image" class="form-control image">
                  </div>
               <!-- ////////////////// -->



<div class="input-container">
      <input
      class="btn btn-success btn-block"
      name ="signup"
      type="submit"
      value="signup"
      />
</div>
<br>
<div class="input-container" style="text-align:center;">
  <img src="Admin/layout/admin_img/defuser.png" style="width: 100px" class="img-thumbnail image-preview" alt="">
</div>
  </form>
  <!-- end pf signup Form -->
<?php

if (isset($mssgbox)) {

?>
  <div class="alert success">
    <span class="closebtn">&times;</span>
    <strong>Success!</strong><?php echo $mssgbox; ?>
  </div>

<?php
}
  ?>


  <div class="the-errors text-center">
    <?php
      if(!empty($formErrors)){
      foreach ($formErrors as $error) {
        echo $error . '<br>';
      }
      }
?>

    </div>

  </div>


<?php include 'include/template/footer.php' ?>
