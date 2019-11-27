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

  //chek if get request userid is numeric &get the int value of it
  $userid = isset ($_GET['userid'])&& is_numeric($_GET['userid']) ? intval ($_GET['userid']) : 0;
 //select all data depend on this ID

    $stmt = $con->prepare("SELECT * FROM user WHERE UserID = 1 Limit  1");

//execute query

    $stmt->execute(array($userid));

//fetch the data

    $row=$stmt->fetch();

//the row count

    $count =$stmt->rowCount();

//if ther is such id show the form

    if ($stmt->rowCount() > 0)
    {

       ?>

  <div class="container">



    <div class="row">
   <form class="col s9">
     <div class="row">
       <div class="input-field col s6">
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="text" class="validate" value="<?php echo  $row ['UserName']?>">
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
          <input id="icon_prefix" type="text" class="validate" value="<?php echo $row['FullName'];?>">
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
            <input id="password" type="password" class="validate"  value="<?php echo $row ['Password']; ?>">
            <label for="password">Password</label>
          </div>
        </div>

        <div class="row">
       <form class="col s9">
         <div class="row">
           <div class="input-field col s9">
             <i class="material-icons prefix">email</i>
                <input id="email" type="email" class="validate" value="<?php echo  $row ['Email']?>">
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
}
else
{
  echo   'theres no such ID';
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
