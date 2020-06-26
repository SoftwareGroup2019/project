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

<h4 class="center">Manage Category</h4>

  <table class="responsive-table striped centered card">
         <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Description</th>
               <th>Options</th>
           </tr>
         </thead>

         <tbody>

        <?php

        foreach ($cats as $cat)
         {
          echo "<tr>";
           echo "<td>". $cat["ID"] ."</td>";
           echo "<td>". $cat['Name'] ."</td>";
            echo "<td>". $cat['Description'] ."</td>";
           echo "<td>";
        ?>
           <a href="Categoris.php?do=Edit&catid=<?php echo $cat['ID']; ?>" class="waves-effect waves-light btn-small tooltipped" data-position="left" data-tooltip="Edit" style="background-color:#2e7d32 !important;"><i class="material-icons">edit</i></a>
           <a href="?do=Delete&catid=<?php echo $cat['ID']; ?>" class="waves-effect waves-light btn-small tooltipped conf" data-position="right" data-tooltip="Delete" style="background-color:#b71c1c !important;"><i class="material-icons">delete</i></a>
           <?php

          echo "</td>";
          echo "</tr>";
                     }
          ?>
         </tbody>
       </table>

 <a href="Categoris.php?do=add" class="waves-effect waves-light btn">
   <i class="material-icons right">add</i>
   add Category
 </a>

</div>


<?php

}
elseif ($do =='add')
{
  ?>



    <div class="container">


 <h4 class="center-align">Add New Categoris</h4>

     <form action="Categoris.php?do=insert" method="post">




         <div class="container">



         <div class="input-field col s12">
         <input id ="icon_prefix" type="text" class="validate" name="name">
         <label > name </label>
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

             <form class=""action="Categoris.php?do=Update" method="post">
                <input type="hidden" name="catid" value="<?php echo $catid ?>" />

                 <div class="container">

                 <div class="input-field col s12">
                 <input id ="icon_prefix" type="text" class="validate" name="name" value="<?php echo $cat['Name']?>">
                 <label > name </label>
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
           <input type="submit" value="SAVE">
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
elseif($do == 'Delete')  {

  echo "<div class = 'container'>";

  $catid = isset( $_GET['catid'] ) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
  //lerash userman bang krditawa.
  //$stmt = $con->prepare("SELECT * FROM user WHERE UserID = ? LIMIT 1");

  $check = checkItem('ID', 'categories' , $catid);

  //execute query

    //  $stmt->execute(array($userid));
  //id database rabt dakatn.
  //fetch the data

    //  $row=$stmt->fetch();

  //the row count

      //$count =$stmt->rowCount();

  if  ($check >0) {
  //agar hatw 1 gawratr bu la 0 awa ishakaman lo bkatn.
    $stmt = $con->prepare("DELETE FROM categories WHERE ID=:zid");

   $stmt->bindparam(':zid',$catid);

   $stmt->execute();


   ?>
   <h3 class="center">
   Category Deleted successfully
   </h3>
   <h4 class="center alert-success">
       Delete Done. Redirecting after <span id="countdown">5</span> seconds
   </h4>
   <script type="text/javascript">
      var seconds = 5;
      function countdown() {
          seconds = seconds - 1;
          if (seconds < 0) {
              // Chnage your redirection link here
              window.location = "http://localhost/project/Admin/Categoris.php";
          } else {
              // Update remaining seconds
              document.getElementById("countdown").innerHTML = seconds;
              // Count down using javascript
              window.setTimeout("countdown()", 1000);
          }
      }
      countdown();
   </script>

   <?php

  }

  else {
   //agar hatw userid nabu pet ble aw usera nya.
    $errormsg= "There is no user";
    redirectHome($errormsg , 3);
  }

echo "</div>";

} //end of else if ($do == 'Delete')
    elseif($do == 'Update')  {



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


                              ?>
                              <h3 class="center">
                              Category Updated successfully
                              </h3>
                              <h4 class="center alert-success">
                                  Update Done. Redirecting after <span id="countdown">5</span> seconds
                              </h4>
                              <script type="text/javascript">
                                 var seconds = 5;
                                 function countdown() {
                                     seconds = seconds - 1;
                                     if (seconds < 0) {
                                         // Chnage your redirection link here
                                         window.location = "http://localhost/project/Admin/Categoris.php";
                                     } else {
                                         // Update remaining seconds
                                         document.getElementById("countdown").innerHTML = seconds;
                                         // Count down using javascript
                                         window.setTimeout("countdown()", 1000);
                                     }
                                 }
                                 countdown();
                              </script>

                              <?php



      }

    else{
        $theMsg ='<div calss="alert alert-danger">Sorry You Cant Brouse This Page Directly</div>';
        redirectHome($theMsg);

      }

      echo "</div>";

    } //end of post update requst

   // end of update



  elseif ($do == 'insert')
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {



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

?>
<h3 class="center">
Category Added successfully
</h3>
<h4 class="center alert-success">
    Insert Done. Redirecting after <span id="countdown">5</span> seconds
</h4>
<script type="text/javascript">
   var seconds = 5;
   function countdown() {
       seconds = seconds - 1;
       if (seconds < 0) {
           // Chnage your redirection link here
           window.location = "http://localhost/project/Admin/Categoris.php";
       } else {
           // Update remaining seconds
           document.getElementById("countdown").innerHTML = seconds;
           // Count down using javascript
           window.setTimeout("countdown()", 1000);
       }
   }
   countdown();
</script>

<?php

    }



    } // end of post insert requst

    else{

      }
      echo "</div>";
  } // end of insert


     include 'include/template/footer.php';
}
//end of session
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
