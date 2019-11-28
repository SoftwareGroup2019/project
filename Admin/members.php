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

// mange page

echo "this is manage page";

}
else if($do=='Edit'){ //Edit page

$userid = $_GET['userid'];



$stmt = $con->prepare("SELECT * FROM user WHERE UserID = ? LIMIT 1");

//execute query

    $stmt->execute(array($userid));

//fetch the data

    $row=$stmt->fetch();

//the row count

    $count =$stmt->rowCount();

//if ther is such id show the form

    if ($count > 0)
    {

       ?>

 <!-- start of container -->
  <div class="container">



   <!-- start of form -->
   <form class="col s12" action="?do=Update" method="POST">
     <input type="hidden" name="userid" value="<?php echo $userid ?>" />

     <!-- start of row -->
     <div class="row">

        <!-- Username -->
       <div class="input-field col s12">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" name="user" class="validate" value="<?php echo $row ['UserName'];?>" required="required">
         <label for="icon_prefix">UserName</label>
       </div>
       <!-- ////////////////// -->

        <!-- Full Name -->
       <div class="input-field col s12">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" name="full"  class="validate" value="<?php echo $row['FullName'];?>"required="required">
         <label for="icon_prefix">FullName</label>
       </div>
       <!-- ////////////////// -->

      <!-- Email -->
       <div class="input-field col s12">
         <i class="material-icons prefix">email</i>
         <input id="icon_prefix" type="email" name="email" class="validate" value="<?php echo $row['Email'];?>"required="required">
         <label for="icon_prefix">Email</label>
       </div>
       <!-- ////////////////// -->

       <!-- Password -->
       <div class="input-field col s12">
         <i class="material-icons prefix">lock</i>
      <input id="password" type="hidden" name="oldpassword" class="validate" value="<?php echo $row['Password']?>">
      <input id="password" type="password" name="newpassword" class="validate" placeholder="am basha bparena gar natawe bygory">
      <label for="password">Password</label>
      </div>
    <!-- ////////////////// -->

      <!-- Buttton -->
    <button class="btn waves-effect waves-light" type="submit" name="action">Save
      <i class="material-icons right"></i>
    </button>
      <!-- ////////////////// -->

  </div>
  <!-- end of row -->

  </form>
  <!-- end of form  -->
   </div>
   <!-- end of container -->




<?php


}

else
{
  echo   'theres no such ID';
}

} //end of else if ($do == 'Edit')
    elseif($do == 'Update')  {
    echo   " <h1 class = 'text-center'> Update Member </h>";
    echo "<div class='container'>";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $id = $_POST['userid'];
      $user = $_POST['user'];
      $email = $_POST['email'];
      $name = $_POST['full'];

      $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);
      // agar inputakan ba bataly baje bely away xware tatbyq dabi
      $formErrors = array();
      if (strlen($user)<4){
        $formErrors[] = '<div class="alert alert-danger"> UserName cant Be Less Than <strong> 4 Characters</strong></div>';
      }
      // agar username zyatr by la20 error dada away xware lo awaya
      if (strlen($user)>20){
        $formErrors[] = '<div class="alert alert-danger">UserN cant Be more Than <strong> 20 Characters</strong></div>';
      }
      // awanash har awhaya agar batal bi aw ifana tatbyq dabi barxola
      if(empty($user)){
        $formErrors[] = '<div class="alert alert-danger">UserName cant Be <strong> Empty </strong></div>';
      }
      if(empty($name)){
        $formErrors[] = '<div class="alert alert-danger">Full Name cant Be <strong> Empty </strong></div>';
      }
      if(empty($email)){
        $formErrors[] = '<div class="alert alert-danger">Email cant Be <strong> Empty </strong></div>';
      }
      // loop labo away bzany error haya
      foreach($formErrors as $error){
        echo $error ;
      }
      if (empty($formErrors)){

      //  echo $id . $user . $email . $name;
      // update zanyryakany usery la naw database dakay
      $stmt = $con->prepare("UPDATE user SET UserName =?,Email = ?,FullName =?, Password = ? WHERE UserID = ? ");
      $stmt->execute(array($user, $email,$name ,$pass,$id));
      echo "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Update</div>';
    }
  }
  else{
       echo "Sorry You Cant Brouse This Page Directly";
    }
    echo "</div>";
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
