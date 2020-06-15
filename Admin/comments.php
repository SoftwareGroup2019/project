
<?php
session_start();
$pageTitle = "comments";
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
  $stmt = $con->prepare("SELECT
                                comments.*, items.Name As Item_Name, users.Username As Member
                        FROM
                                comments
                        INNER join
                                items
                        ON
                                items.Item_ID = comments.item_id
                        INNER join
                                Users
                        ON
                                users.UserID = comments.user_id
                                ORDER BY
                                c_id DESC");

     $stmt->execute();

     $rows=$stmt->fetchAll();



// mange page
?>

<h4 class="center">Manage comments</h4>

<div class="container">
  <table class="responsive-table striped centered card">
         <thead>
           <tr>
               <th>ID</th>
               <th>Comment</th>
               <th>Item Name</th>
	 	            <th>User Name</th>
               <th>Added Date</th>
               <th>Options</th>
           </tr>
         </thead>

         <tbody>

        <?php

        foreach ($rows as $row ) {
          echo "<tr>";
           echo "<td>". $row["c_id"] ."</td>";
           echo "<td>". $row["comment"] ."</td>";
           echo "<td>". $row["Item_Name"] ."</td>";
           echo "<td>". $row["members"] ."</td>";
           echo "<td>". $row['comment_date'] ."</td>";
           echo "<td>";
        ?>
           <a class="waves-effect waves-light btn-small tooltipped" data-position="left" data-tooltip="Edit" style="background-color:#2e7d32 !important;"><i class="material-icons">edit</i></a>
           <a href="?do=Delete&comid=<?php echo $row["c_id"]; ?>" class="waves-effect waves-light btn-small tooltipped conf" data-position="right" data-tooltip="Delete" style="background-color:#b71c1c !important;"><i class="material-icons">delete</i></a>
           <?php

             if($row['status'] == 0 ) {
            ?>
               <a href="?do=Approve&comid=<?php echo $row["c_id"]; ?>" class="waves-effect waves-light btn-small tooltipped " data-position="right" data-tooltip="Delete" style="background-color:blue !important;"><i class="material-icons">delete</i></a>
<?php

             }
          ?>

              <?php


           echo "</td>";
          echo "</tr>";
        }

         ?>



         </tbody>
       </table>

    <br>
    <a class="waves-effect waves-light btn"
</div>




<?php



}
else if($do=='Edit'){ //Edit page

$comid = $_GET['comid'];



$stmt = $con->prepare("SELECT * FROM comments WHERE c_id = ? LIMIT 1");

//execute query

    $stmt->execute(array($comid));

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

      <h4 class="center">Edit comment</h4>

   <!-- start of form -->
   <form class="col s12" action="?do=Update" method="POST">
     <input type="hidden" name="comid" value="<?php echo $comid ?>" />

     <!-- start of row -->
     <div class="row">

        <!-- Username -->
       <div class="input-field col s12">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" name="user" class="validate" value="<?php echo $row ['Username'];?>">
         <label for="icon_prefix">Comment</label>
       </div>
       <!-- ////////////////// -->
      <textarea class="from-control" name="comment"><<?php  echo $row['comment'] ?> </textarea>

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
  echo "<div calass='container'>";
  $theMsg = '<div class="alert alert-danger">theres no such ID</div>';
  redirectHome($theMsg);
  echo "</div>";
}

} //end of else if ($do == 'Edit')
    elseif($do == 'Update')  {
    echo   " <h4 class='center'> Update Comment </h4>";
    echo "<div class='container'>";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $comid = $_POST['comid'];
      $comment = $_POST['comment'];

      $stmt = $con->prepare("UPDATE comments SET comment = ? WHERE c_id = ?");

      $stmt->execute(array($comment, $comid));


  }
  else{
      $theMsg ='<div calss="alert alert-danger">Sorry You Cant Brouse This Page Directly</div>';
      redirectHome($theMsg);

    }

  } //end of post update requst
  } // end of update

 // end of add

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
            echo '<div class = "alert alert-dnger">Sorry this user is Exist</div>';
            redirectHome($theMsg, 'back');
          } else {


$stmt=$con->prepare("INSERT INTO
                     user(UserName ,password,email,FullName,RegStatus,Date)
                     VALUES(:zuser,:zpass,:zmail,:zname,0,now())");
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
         $theMsg= '<div class="alert alert-danger">Sorry You Cant Brouse This Page Directly </div>';
         redirectHome($theMsg);
      }
      echo "</div>";
  } // end of insert

elseif ($do =='Delete') {

$comid = $_GET['comid'];
//lerash userman bang krditawa.
//$stmt = $con->prepare("SELECT * FROM user WHERE UserID = ? LIMIT 1");

$chek = checkItem('c_id', 'comments' , $comid);

//execute query

  //  $stmt->execute(array($userid));
//id database rabt dakatn.
//fetch the data

  //  $row=$stmt->fetch();

//the row count

    //$count =$stmt->rowCount();

if  ($chek >0) {
//agar hatw 1 gawratr bu la 0 awa ishakaman lo bkatn.
  $stmt = $con->prepare("DELETE FROM comments WHERE c_id=:zuserid");

 $stmt->bindparam(':zuserid',$userid);

 $stmt->execute();

$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
 redirectHome($theMsg);

}

else {
 //agar hatw userid nabu pet ble aw usera nya.
  $errormsg= "There is no user";
  redirectHome($errormsg , 3);
}



  // code...
}elseif ($do == 'Approve') {
  $comid = $_GET['comid'];
  //lerash userman bang krditawa.
  //$stmt = $con->prepare("SELECT * FROM user WHERE UserID = ? LIMIT 1");

  $chek = checkItem('c_id', 'comments' , $comid);

  //execute query

    //  $stmt->execute(array($userid));
  //id database rabt dakatn.
  //fetch the data

    //  $row=$stmt->fetch();

  //the row count

      //$count =$stmt->rowCount();

  if  ($chek >0) {
  //agar hatw 1 gawratr bu la 0 awa ishakaman lo bkatn.
    $stmt = $con->prepare("UPDATE comments SET status =1 WHERE c_id = ? ");

   $stmt->execute(array($comid));

  $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Approve</div>';
   redirectHome($theMsg 'back');

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
