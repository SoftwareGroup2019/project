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
  // $value = "Ayman";
  // $check = checkItem("Username", "user", $value);
  // if ($check == 1){
  //
  //   echo 'hahaha';
  // } aw coda loo awaya agaer user habu ba haman naw aw if tatbyq daby
  $stmt = $con->prepare("SELECT *
    FROM user
     WHERE GrupID != 1");

     $stmt->execute();

     $rows=$stmt->fetchAll();



// mange page
?>

<h4 class="center">Manage Users</h4>

<div class="container">
  <table class="responsive-table striped centered card">
         <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Date</th>
               <th>Options</th>
           </tr>
         </thead>

         <tbody>

        <?php

        foreach ($rows as $row ) {
          echo "<tr>";
           echo "<td>". $row["UserID"] ."</td>";
           echo "<td>". $row["Username"] ."</td>";
           echo "<td>". $row["Email"] ."</td>";
           echo "<td>". "----" ."</td>";
           echo "<td>";
           ?>
           <a class="waves-effect waves-light btn-small tooltipped" data-position="left" data-tooltip="Edit"><i class="material-icons">edit</i></a>
           <a href="?do=Delete&userid=<?php echo $row["UserID"]; ?>" class="waves-effect waves-light btn-small tooltipped conf" data-position="right" data-tooltip="Delete" style="background-color:#d32f2f;"><i class="material-icons">delete</i></a
           <?php
           echo "</td>";
          echo "</tr>";
        }

         ?>



         </tbody>
       </table>

    <br>
    <a class="waves-effect waves-light btn" href="members.php?do=add" style="background-color:#1976d2;">
      <i class="material-icons right">add</i>Add User</a>
</div>




<?php



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

      <h4 class="center">Edit User</h4>

   <!-- start of form -->
   <form class="col s12" action="?do=Update" method="POST">
     <input type="hidden" name="userid" value="<?php echo $userid ?>" />

     <!-- start of row -->
     <div class="row">

        <!-- Username -->
       <div class="input-field col s12">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" name="user" class="validate" value="<?php echo $row ['Username'];?>">
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
    <button class="btn waves-effect waves-light" type="submit" name="action">Update
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

      $formErrors = array();
      if (strlen($user)<4){
        $formErrors[] = 'UserName cant Be Less Than <strong> 4 Characters</strong>';
      }
      // agar username zyatr by la20 error dada away xware lo awaya
      if (strlen($user)>20){
        $formErrors[] = 'UserN cant Be more Than <strong> 20 Characters</strong>';
      }
      // awanash har awhaya agar batal bi aw ifana tatbyq dabi barxola
      if(empty($user)){
        $formErrors[] = 'UserName cant Be <strong> Empty </strong>';
        if(empty($pass)){
          $formErrors[] = 'password cant Be <strong> Empty </strong>';
      }
      if(empty($name)){
        $formErrors[] = 'Full Name cant Be <strong> Empty </strong>';
      }
      if(empty($email)){
        $formErrors[] = 'Email cant Be <strong> Empty </strong>';
      }
      // loop labo away bzany error haya
      foreach($formErrors as $error){
        echo ' <div class="alert alert-danger" ' .  $error .'</div>';

      }
      if (empty($formErrors)){

      //  echo $id . $user . $email . $name;
      // update zanyryakany usery la naw database dakay

      echo "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';
    }
  }
  else{
       echo "Sorry You Cant Brouse This Page Directly";

    }

  } //end of post update requst
  } // end of update

elseif ($do =='add') {
      // code..
      ?>
      <div class="container">

  <h4 class="center">Add Users</h4>

       <!-- start of form -->
       <form class="col s12" action="?do=insert" method="POST">


         <!-- start of row -->
         <div class="row">

            <!-- Username -->
           <div class="input-field col s12">
             <i class="material-icons prefix">account_circle</i>
             <input id="icon_prefix" type="text" name="user" class="validate" required="required">
             <label for="icon_prefix">UserName</label>
           </div>
           <!-- ////////////////// -->

            <!-- Full Name -->
           <div class="input-field col s12">
             <i class="material-icons prefix">account_circle</i>
             <input id="icon_prefix" type="text" name="full" required="required">
             <label for="icon_prefix">FullName</label>
           </div>
           <!-- ////////////////// -->


          <!-- Email -->
           <div class="input-field col s12">
             <i class="material-icons prefix">email</i>
             <input id="icon_prefix" type="email" name="email" class="validate" required="required">
             <label for="icon_prefix">Email</label>
           </div>
           <!-- ////////////////// -->

           <!-- Password -->
           <div class="input-field col s12">
             <i class="material-icons prefix">lock</i>
          <input id="password" type="password" name="newpassword" class="validate">
          <label for="password">Password</label>
          </div>
        <!-- ////////////////// -->

          <!-- Buttton -->
        <button class="btn waves-effect waves-light" type="submit" name="action">Add
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


  } // end of add

  elseif ($do == 'insert') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        echo   " <h4 class = 'center'> Insert Users </h4>";


        $user = $_POST['user'];
        $pass = $_POST['newpassword'];
        $email = $_POST['email'];
        $name = $_POST['full'];


        // agar inputakan ba bataly baje bely away xware tatbyq dabi
        $formErrors = array();
        // agar username zyatr by la20 error dada away xware lo awaya
        if (strlen($user)>20){
          $formErrors[] = 'UserN cant Be more Than <strong> 20 Characters</strong>';
        }
      if(empty($pass)){
            $formErrors[] = 'password cant Be <strong> Empty </strong>';
        }
        if(empty($name)){
          $formErrors[] = 'Full Name cant Be <strong> Empty </strong>';
        }
        if(empty($email)){
          $formErrors[] = 'Email cant Be <strong> Empty </strong>';
        }
        // loop labo away bzany error haya
        foreach($formErrors as $error){
          echo ' <div class="alert alert-danger" ' .  $error .'</div>';

        }
        if (empty($formErrors)){
          $check = checkItem("Username", "user", $user);
          if ($check == 1){
            echo 'Sorry this user is Exist';
          } else {


$stmt=$con ->prepare("INSERT INTO
                     user(UserName ,password,email,FullName)
                     VALUES(:zuser,:zpass,:zmail,:zname)");
        //  echo $id . $user . $email . $name;
        // update zanyryakany usery la naw database dakay
$stmt->execute(array(

'zuser'=>$user,
'zpass'=>$pass,
'zmail'=>$email,
'zname'=>$name


// zanyary user nuwe daxl dakay baw array dachta naw database

));
       echo "User Added successfully";
      redirectHome(" ");

    } }// end of empty error



    } // end of post insert requst

    else{
         $errormsg= "Sorry You Cant Brouse This Page Directly";
         redirectHome($errormsg , 3);
      }
  } // end of insert

elseif ($do =='Delete') {

$userid = $_GET['userid'];
//lerash userman bang krditawa.
$stmt = $con->prepare("SELECT * FROM user WHERE UserID = ? LIMIT 1");

//execute query

    $stmt->execute(array($userid));
//id database rabt dakatn.
//fetch the data

    $row=$stmt->fetch();

//the row count

    $count =$stmt->rowCount();

if  ($count >0) {
//agar hatw 1 gawratr bu la 0 awa ishakaman lo bkatn.
  $stmt = $con->prepare("DELETE FROM user WHERE UserID=:zuserid");

 $stmt->bindparam(':zuserid',$userid);

 $stmt->execute();

 echo "User Deleted";
 redirectHome(" ");

}

else {
 //agar hatw userid nabu pet ble aw usera nya.
  $errormsg= "There is no user";
  redirectHome($errormsg , 3);
}

  // code...
}



    include 'include/template/footer.php';
  } /// end of session

else
{
  header('location: index.php');
  exit();
}
  ?>
