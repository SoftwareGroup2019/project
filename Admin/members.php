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



$stmt = $con->prepare("SELECT UserName,Email,Password,FullName FROM user WHERE UserID = ? LIMIT 1");

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
   <form class="col s12">

     <!-- start of row -->
     <div class="row">

        <!-- Username -->
       <div class="input-field col s12">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" class="validate" value="<?php echo $row ['UserName'];?>">
         <label for="icon_prefix">UserName</label>
       </div>
       <!-- ////////////////// -->

        <!-- Full Name -->
       <div class="input-field col s12">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" class="validate" value="<?php echo $row['FullName'];?>">
         <label for="icon_prefix">FullName</label>
       </div>
       <!-- ////////////////// -->

      <!-- Email -->
       <div class="input-field col s12">
         <i class="material-icons prefix">email</i>
         <input id="icon_prefix" type="email" class="validate" value="<?php echo $row['Email'];?>">
         <label for="icon_prefix">Email</label>
       </div>
       <!-- ////////////////// -->

       <!-- Password -->
       <div class="input-field col s12">
         <i class="material-icons prefix">lock</i>
      <input id="password" type="password" class="validate">
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





include 'include/template/footer.php';

}

// Reuest end here
else
{
  header('location: index.php');
  exit();
}


?>
