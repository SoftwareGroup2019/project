
<?php
session_start();
$pageTitle = "Dashboard";
if(isset($_SESSION['UserName']))
{
 include 'include/template/header.php';
 include 'include/template/navbar.php';
 include 'conect.php';


$do = isset($_GET['do'])? $_GET['do']: 'manage';


/////////////////////////////////////////////////////////
if ($do =='manage')
{ // start of Manage

?>
<div class="container">
  <br>
<a href="item.php?do=add" class="waves-effect waves-light btn">
  <i class="material-icons right">add</i>
  add item
</a>
</div>


<?php

} // end of manage
/////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
elseif ($do =='add') {
      // code..
      ?>
      <div class="container">

  <h4 class="center">Add item</h4>

       <!-- start of form -->
       <form class="col s12" action="?do=insert" method="POST">


         <!-- start of row -->
         <div class="row">

            <!-- name -->
           <div class="input-field col s12">
             <i class="material-icons prefix">local_grocery_store</i>
             <input id="icon_prefix" type="text" name="user" class="validate" required="required">
             <label for="icon_prefix">Item Name</label>
           </div>
           <!-- ////////////////// -->

            <!-- Description -->
           <div class="input-field col s12">
             <i class="material-icons prefix">receipt</i>
             <input id="icon_prefix" type="text" name="full" required="required">
             <label for="icon_prefix">Description</label>
           </div>
           <!-- ////////////////// -->


          <!-- Price -->
           <div class="input-field col s12">
             <i class="material-icons prefix">account_balance</i>
             <input id="icon_prefix" type="text" name="email" class="validate" required="required">
             <label for="icon_prefix">Price</label>
           </div>
           <!-- ////////////////// -->

           <!-- Country -->
           <div class="input-field col s12">
             <i class="material-icons prefix">add_location</i>
          <input id="password" type="text" name="newpassword" class="validate">
          <label for="password">Country</label>
          </div>
        <!-- ////////////////// -->

        <!-- start of status -->
        <div class="input-field col s12">
           <i class="material-icons prefix">info</i>
          <select>
            <option value="0" disabled selected>...</option>
            <option value="1">New</option>
            <option value="2">Like New</option>
            <option value="3">Used</option>
            <option value="3">Very Old</option>
          </select>
          <label>Status</label>
        </div>
        <!-- end of status -->



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
///////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////
elseif ($do == 'insert')
{//start of insert
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    echo   " <h4 class = 'center'> Insert item </h4>";


    $name        = $_POST['name'];
    $desc        = $_POST['descriptior'];
    $price       = $_POST['price'];
    $country     = $_POST['country'];
    $status     = $_POST['status'];


    // agar inputakan ba bataly baje bely away xware tatbyq dabi
    $formErrors = array();
    // agar username zyatr by la20 error dada away xware lo awaya
    if (empty( $name )){
      $formErrors[] = 'Name can\'t be <strong> empty</strong>';
    }
  if(empty($desc)){
        $formErrors[] = 'Desc can\'t be <strong> empty</strong>';
    }
    if(empty($price)){
      $formErrors[] = 'Price can\'t be <strong> empty</strong>';
    }
    if(empty($country )){
      $formErrors[] = 'Country can\'t be <strong> empty</strong>';
    }
    if ( $status == 0){
      $formErrors[] ='You Must choose the <strong> empty</strong>';
    }
    // loop labo away bzany error hayay
    foreach($formErrors as $error){
      echo ' <div class="alert alert-danger" ' .  $error .'</div>';

    }
    if (empty($formErrors)){



$stmt = $con->prepare("INSERT INTO
                items(Name ,Description,Price,Country_Made,Status,Add_Date)
                 VALUES(:zname,:zdesc,:zprice,:zcountry,zstatus,now())");
    //  echo $id . $user . $email . $name;
    // update zanyryakany usery la naw database dakay
$stmt->execute(array(

'zname'      =>$name,
'zdesc'      =>$desc,
'zprice'     =>$price,
'zcountry'    =>$country,
'zstatus'    =>$status

// zanyary user nuwe daxl dakay baw array dachta naw database

));
   echo "User Added successfully";
  redirectHome($theMsg);

} }// end of empty error



 // end of post insert requst

else{
     $theMsg= '<div class="alert alert-danger">Sorry You Cant Brouse This Page Directly </div>';
     redirectHome($theMsg);
  }
  echo "</div>";
} // end of insert




//////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////
elseif($do=='Edit')
{ //Edit page



} //end of else if ($do == 'Edit')
/////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////
elseif($do == 'Update')
{//start of update




} // end of update
//////////////////////////////////////////////////////////






//////////////////////////////////////////////////////////////
elseif ($do =='Delete')
{ // start of delete






} // end of delete
//////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////
elseif ($do == 'Activate')
{ // start of activate






} // end of activate
//////////////////////////////////////////////////////////////



/////////// bvaya ////////////////////////////////////////////
////////// Dwr bkawawa lera //////////////////////////////////
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
    include 'include/template/footer.php';
  } /// end of session
///////////////////////////////////////////////////////////////
else
{
  header('location: index.php');
  exit();
}
  ?>
