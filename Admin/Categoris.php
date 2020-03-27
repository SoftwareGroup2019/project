<?php
  session_start();
  $pageTitle = "Categoris";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
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

   <h3>Add New Categoris</h3>

   <div class="row">

     <div class="input-field col s8">
     <input id ="icon_prefix" type="text" class="validate" name="name">
     <label > name </label>
     </div>


     <div class="input-field col s8">
     <input id ="icon_telephone" type="text" class="validate" name="Description">
     <label> Description </label>
     </div>

     <div class="input-field col s8">
     <input id ="icon_telephone" type="text" class="validate" name="Ordering">
     <label> Ordering</label>
     </div>

     <div class="input-field col s12">
     <t>Vsible</t>
     <form action="#">
       <p>
         <label>
           <input name="group1" type="radio" checked />
           <span>Yes</span>
         </label>
       </p>
       <p>
         <label>
           <input name="group1" type="radio" />
           <span>no</span>
         </label>
       </p>
     </div>

     <div class="input-field col s12">
         <t>Allow Comnenting</t>
     <form action="#">
       <p>
         <label>
           <input name="group2" type="radio" checked />
           <span>Yes</span>
         </label>
       </p>
       <p>
         <label>
           <input name="group2" type="radio" />
           <span>No</span>
         </label>
       </p>
     </div>

     <div class="input-field col s12">
         <t>Allow Ads</t>
     <form action="#">

       <p>
       <label>
           <input name="group4" type="radio" checked />
           <span>Yes</span>
         </label>

       </p>
       <p>
         <label>
           <input name="group4" type="radio" />
           <span>no</span>
         </label>
       </p>
     </div>
   <div class="input-field col s12">
   <a class="waves-effect waves-light btn">button</a>
   </div>
   <?php

}
elseif($do  ==  'Edit'){ //Edit page


} //end of else if ($do == 'Edit')
    elseif($do == 'Update')  {

  } // end of update



  elseif ($do == 'insert') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        echo   " <h4 class = 'center'> Insert Catrgory </h4>";


        $name = $_POST['Name'];
        $desc = $_POST['Description'];
        $order = $_POST['Ordering'];
        $visible = $_POST['Vsible'];
        $coment = $_POST['Allow Comnenting'];
        $ads = $_POST['Allow Ads'];



          $check = checkItem("name", "categories", $name);
          if ($check == 1){
            echo '<div class = "alert alert-dnger">Sorry this Categories is Exist</div>';
            redirectHome($theMsg, 'back');
          } else {


$stmt=$con ->prepare("INSERT INTO
                     categories(Name ,Description,Ordering,Visibility,Allow_Comment,Allow_Ads)
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
         $theMsg= '<div class="alert alert-danger">Sorry You Cant Brouse This Page Directly </div>';
         redirectHome($theMsg);
      }
      echo "</div>";
  } // end of insert

elseif ($do =='Delete') {

}
     include 'include/template/footer.php';
  }
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
