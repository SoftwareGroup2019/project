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




     <form action="Categoris.php?do=insert" method="post">


       <h3>Add New Categoris</h3>



         <div class="input-field col s6">
         <input id ="icon_prefix" type="text" class="validate" name="name">
         <label > name </label>
         </div>


         <div class="input-field col s6">
         <input id ="icon_telephone" type="text" class="validate" name="Description">
         <label> Description </label>
         </div>

         <div class="input-field col s6">
         <input id ="icon_telephone" type="text" class="validate" name="Ordering">
         <label> Ordering</label>
         </div>

         <div class="form-group form-group-lg">
           <label class="col-sm-2 control-label">visible</label>
           <div class="col-sm-10 col-sm-6">
             <div>
               <input id="vis-Yes" type="radio" name="Visibility" value="0" checked />
               <label for="vis-Yes">Yes</label>
             </div>
             <div>
               <input id="vis-No" type="radio" name="Visibility" value="1" checked />
               <label for="vis-No">No</label>
             </div>
           </div>
         </div>
         <div class="form-group form-group-lg">
           <label class="col-sm-2 control-label">Allow Comnenting</label>
           <div class="col-sm-10 col-sm-6">
             <div>
               <input id="com-Yes" type="radio" name="Comnenting" value="0" checked />
               <label for="com-Yes">Yes</label>
             </div>
             <div>
               <input id="com-No" type="radio" name="Comnenting" value="1"  />
               <label for="com-No">No</label>
             </div>
           </div>
         </div>
         <div class="form-group form-group-lg">
           <label class="col-sm-2 control-label">Allow Ads</label>
           <div class="col-sm-10 col-sm-6">
             <div>
               <input id="Ads-Yes" type="radio" name="Ads" value="0" checked />
               <label for="Ads-Yes">Yes</label>
             </div>
             <div>
               <input id="Ads-No" type="radio" name="Ads" value="1"  />
               <label for="Ads-NO">No</label>
             </div>
           </div>
         </div>


   <div class="input-field col s12">
   <input type="submit" class="waves-effect waves-light btn">button</input>
   </div>

 </form>
   <?php

}
elseif($do  ==  'Edit')
{ //Edit page


} //end of else if ($do == 'Edit')
    elseif($do == 'Update')  {

  } // end of update



  elseif ($do == 'insert') {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        echo   " <h4 class = 'center'> Insert Catrgory </h4>";


        $name = $_POST['name'];
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
