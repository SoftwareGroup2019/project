<?php
  session_start();
  $pageTitle = "Categoris";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
 include 'conect.php';


$do = isset($_GET['do'])? $_GET['do']: 'manage';


if ($do =='manage')
{

  $sort = 'ASC';

  $soty_array = array('ASC' , 'DESC');

  if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {
    $sort = $_GET['sort'];
  }
  $stmt2 =$con->prepare("SELECT * FROM categories ORDER BY Ordering $sort");

  $stmt2->execute();

  $cats = $stmt2->fetchAll();

?>

<div class="container">

  <ul class="collection with-header">
         <li class="collection-header"><h4>Manage Categories</h4></li>
<?php

foreach ($cats as $cat)
{
?>
<li class="collection-item">
  <div><?php echo $cat['Name']; ?>

    <?php
echo "<a href='Categoris.php?do=Edit&catid=" . $cat['ID'] ."' class='secondary-content' >
  <i class='material-icons'>edit</i>
</a>";
     ?>

<?php
echo "<a href='Categoris.php?do=Delete&catid=" . $cat['ID'] ."' class='secondary-content'>
    <i class='material-icons'>delete</i>
  </a>";
 ?>


  </div>
</li>



<?php

}

?>

 </ul>
</div>



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
   <input type="submit" value="ADD">
   </div>
</div>
 </form>

   </div>
   <?php

}
elseif($do  ==  'Edit')
{ //Edit page

  $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;



  $stmt = $con->prepare("SELECT * FROM categories WHERE ID = ? ");

  //execute query

      $stmt->execute(array($catid));

  //fetch the data

      $cat=$stmt->fetch();

  //the row count

      $count =$stmt->rowCount();

  //if ther is such id show the form

      if ($count > 0)
      {  ?>

            <div class="container">


         <h4 class="center-align">Edit Categoris</h4>

             <form class="card z-depth-2"action="Categoris.php?do=Update" method="post">
                <input type="hidden" name="catid" value="<?php echo $catid ?>" />

                 <div class="container">


                 <div class="row">
                 <div class="input-field col s12">
                 <input id ="icon_prefix" type="text" class="validate" name="name" value="<?php echo $cat['Name']?>">
                 <label > name </label>
                 </div>
                </div>

                 <div class="input-field col s12">
                 <input id ="icon_telephone" type="text" class="validate" name="Description" value="<?php echo $cat['Description']?>">
                 <label> Description </label>
                 </div>

                 <div class="input-field col s12">
                 <input id ="icon_telephone" type="text" class="validate" name="Ordering" value="<?php echo $cat['Ordering']?>">
                 <label> Ordering</label>
                 </div>

                 Visibilty
                 <p>
               <label>
                 <input name="Visibility" type="radio" value="0" <?php if($cat['Visibility'] == 0){echo 'checked' ; }  ?> />
                 <span>Yes</span>
               </label>
             </p>
             <p>
               <label>
                 <input name="Visibility" type="radio" value="1" <?php if($cat['Visibility'] == 1){echo 'checked' ; }  ?> />
                 <span>No</span>
               </label>
             </p>

        Allow Commenting
             <p>
               <label>
                 <input class="with-gap" name="Comnenting" type="radio" value="0" <?php if($cat['Allow_Comment'] == 0){echo 'checked' ; }  ?> />
                 <span>Yes</span>
               </label>
             </p>
             <p>
               <label>
                 <input class="with-gap" name="Comnenting" type="radio" value="1" <?php if($cat['Allow_Comment'] == 1){echo 'checked' ; }  ?> />
                 <span>No</span>
               </label>
             </p>

        Allow Ads
             <p>
               <label>
                 <input class="with-gap" name="Ads" type="radio" value="0" <?php if($cat['Allow_Ads'] == 0){echo 'checked' ; }  ?> />
                 <span>Yes</span>
               </label>
             </p>
             <p>
               <label>
                 <input class="with-gap" name="Ads" type="radio" value="1"  <?php if($cat['Allow_Ads'] == 1){echo 'checked' ; }  ?> />
                 <span>No</span>
               </label>
             </p>

           <div class="input-field col s12">
           <input type="submit" class=" value="SAVE">
           </div>
        </div>
         </form>
           </div>


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


      echo   " <h4 class='center'> Update Categories </h4>";
      echo "<div class='container'>";

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $id         = $_POST['catid'];
        $name       = $_POST['name'];
        $desc       = $_POST['Description'];
        $order      = $_POST['Ordering'];
        $visible    = $_POST['Visibility'];
        $coment     = $_POST['Comnenting'];
        $ads        = $_POST['Ads'];



        //  echo $id . $user . $email . $name;
        // update zanyryakany usery la naw database dakay
        $stmt=$con ->prepare("UPDATE
                             categories
                              SET
                               Name = ?
                                ,Description = ?
                                ,Ordering = ?
                                ,Visibility = ?
                                ,Allow_Comment = ?
                                ,Allow_Ads = ?
                              WHERE ID = ?");
        $stmt->execute(array(

                              $name,
                              $desc,
                              $order,
                              $visible,
                              $coment,
                              $ads, $id  ));

        echo "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';
        redirectHome($theMsg, 'back');

      }

    else{
        $theMsg ='<div calss="alert alert-danger">Sorry You Cant Brouse This Page Directly</div>';
        redirectHome($theMsg);

      }

    } //end of post update requst

   // end of update



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
//end of session
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
