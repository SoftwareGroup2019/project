<?php
  session_start();
  $pageTitle = "Categoris";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
 include 'conect.php';
?>


<?php


$do = isset($_GET['do'])? $_GET['do']: 'manage';


if ($do =='manage')
{
  ?>
<a class="waves-effect waves-light btn" href=" Categoris.php?do=add">Add New categories</a>
<?php
}
elseif ($do =='add')
{
  ?>



    <div class="container">


 <h4 class="center-align">Add New Categoris</h4>

     <form class="card z-depth-2"action="Categoris.php?do=insert" method="post">




         <div class="container">


         <div class="row">
         <div class="input-field col s12">
         <input id ="icon_prefix" type="text" class="validate" name="name">
         <label > name </label>
         </div>
        </div>

         <div class="input-field col s12">
         <input id ="icon_telephone" type="text" class="validate" name="Description">
         <label> Description </label>
         </div>

         <div class="input-field col s12">
         <input id ="icon_telephone" type="text" class="validate" name="Ordering">
         <label> Ordering</label>
         </div>

         Visibilty
         <p>
       <label>
         <input name="Vsible" type="radio" value="0" checked />
         <span>Yes</span>
       </label>
     </p>
     <p>
       <label>
         <input name="Vsible" type="radio" value="1" />
         <span>No</span>
       </label>
     </p>

Allow Commenting
     <p>
       <label>
         <input class="with-gap" name="Comnenting" type="radio" value="0" checked/>
         <span>Yes</span>
       </label>
     </p>
     <p>
       <label>
         <input class="with-gap" name="Comnenting" type="radio" value="1"  />
         <span>No</span>
       </label>
     </p>

Allow Ads
     <p>
       <label>
         <input class="with-gap" name="Ads" type="radio" value="0" checked/>
         <span>Yes</span>
       </label>
     </p>
     <p>
       <label>
         <input class="with-gap" name="Ads" type="radio" value="1"  />
         <span>No</span>
       </label>
     </p>

   <div class="input-field col s12">
   <input type="submit" class=" waves-effect waves-light btn" value="ADD" style="color:white;">
   </div>
</div>
 </form>

   </div>
   <?php

}
elseif($do  ==  'Edit')
{ //Edit page


} //end of else if ($do == 'Edit')
    elseif($do == 'Update')  {

  } // end of update



  elseif ($do == 'insert')
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        echo   " <h4 class = 'center'> Insert Catrgory </h4>";


        $name = $_POST['name'];
        $desc = $_POST['Description'];
        $order = $_POST['Ordering'];
        $visible = $_POST['Vsible'];
        $coment = $_POST['Comnenting'];
        $ads = $_POST['Ads'];


echo $name;


          $check = checkItem("Name", "categories", $name);
          if ($check == 1)
          {
            echo '<div class = "alert alert-dnger">Sorry this Categories is Exist</div>';
            redirectHome($theMsg, 'back');
          }
          else {


$stmt=$con->prepare("INSERT INTO
                     categories(Name,Description,Ordering,Visibility,Allow_Comment,Allow_Ads)
                     VALUES(:zname,:zdesc,:zorder,:zvisible,:zcoment,:zads)");
        //  echo $id . $user . $email . $name;
        // update zanyryakany usery la naw database dakay
$stmt->execute(array(

'zname'=>$name,
'zdesc'=>$desc,
'zorder'=>$order,
'zvisible'=>$visible,
'zcoment' =>$coment,
'zads' => $ads


// zanyary user nuwe daxl dakay baw array dachta naw database

));
       echo "User Added successfully";
      redirectHome(" ");

    }



    } // end of post insert requst

    else{

      }
      echo "</div>";
  } // end of insert
elseif ($do =='Delete')
{

} // end of delete

     include 'include/template/footer.php';
}
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
