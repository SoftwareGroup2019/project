
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
  // $value = "Ayman";
  // $check = checkItem("Username", "user", $value);
  // if ($check == 1){
  //   echo 'hahaha';
  // } aw coda loo awaya agaer user habu ba haman naw aw if tatbyq daby
  $stmt = $con->prepare("SELECT items.*
    ,categories.Name AS categories_name,
     user.Username
      FROM
       items
INNER JOIN
 categories
 ON
  categories.ID =items.Cat_ID
INNER JOIN
user
ON
user.UserID =items.Member_ID");

     $stmt->execute();

     $rows=$stmt->fetchAll();

?>


<h4 class="center">Manage Users</h4>

<div class="container">
  <table class="responsive-table striped centered card">
         <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Description</th>
               <th>Price</th>
               <th>Date</th>
               <th>Categories_name</th>
               <th>User_name </th>
                <th>Action</th>
           </tr>
         </thead>

         <tbody>

        <?php

        foreach ($rows as $row ) {
          echo "<tr>";
           echo "<td>". $row["item_ID"] ."</td>";
           echo "<td>". $row["Name"] ."</td>";
           echo "<td>". $row["Description"] ."</td>";
           echo "<td>". $row["Price"] ."</td>";
           echo "<td>". $row['Add_Date'] ."</td>";
           echo "<td>". $row['categories_name'] ."</td>";
           echo "<td>". $row['Username'] ."</td>";
           echo "<td>";
        ?>
           <a href="#" class="waves-effect waves-light btn-small tooltipped" data-position="left" data-tooltip="Edit" style="background-color:#2e7d32 !important;"><i class="material-icons">edit</i></a>
           <a href="#" class="waves-effect waves-light btn-small tooltipped conf" data-position="right" data-tooltip="Delete" style="background-color:#b71c1c !important;"><i class="material-icons">delete</i></a>


              <?php


           echo "</td>";
          echo "</tr>";
        }

         ?>



         </tbody>
       </table>

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
             <input id="icon_prefix" type="text" name="name" class="validate" >
             <label for="icon_prefix">Item Name</label>
           </div>
           <!-- ////////////////// -->

            <!-- Description -->
           <div class="input-field col s12">
             <i class="material-icons prefix">receipt</i>
             <input id="icon_prefix" type="text" name="descriptior" >
             <label for="icon_prefix">Description</label>
           </div>
           <!-- ////////////////// -->


          <!-- Price -->
           <div class="input-field col s12">
             <i class="material-icons prefix">account_balance</i>
             <input id="icon_prefix" type="text" name="price" class="validate" >
             <label for="icon_prefix">Price</label>
           </div>
           <!-- ////////////////// -->

           <!-- Country -->
           <div class="input-field col s12">
             <i class="material-icons prefix">add_location</i>
          <input id="password" type="text" name="country" class="validate">
          <label for="password">Country</label>
          </div>
        <!-- ////////////////// -->

        <!-- start of status -->
        <div class="input-field col s12">
           <i class="material-icons prefix">info</i>
          <select name="status">
            <option value="0" disabled selected>...</option>
            <option value="1">New</option>
            <option value="2">Like New</option>
            <option value="3">Used</option>
            <option value="3">Very Old</option>
          </select>
          <label>Status</label>
        </div>
        <!-- end of status -->
        <!-- start Member field -->
        <div class="input-field col s12">
           <i class="material-icons prefix">face</i>
          <select name="member">
            <option value="0" disabled selected>...</option>
          <?php
          $stmt =$con ->prepare("select * FROM user");
          $stmt ->execute();
          $user =$stmt ->fetchAll();
          foreach ($user as  $user) {
            echo "<option value='". $user['UserID'] ."'>". $user['Username'] ."</option>";

          }
           ?>
          </select>
          <label>Member</label>
        </div>


        <!-- end Member Field -->
        <div class="input-field col s12">
           <i class="material-icons prefix">shopping_basket</i>
          <select name="categories">
            <option value="0" disabled selected>...</option>
          <?php
          $stmt2 =$con ->prepare("select * FROM  categories");
          $stmt2 ->execute();
          $cats =$stmt2 ->fetchAll();
          foreach ($cats as  $cat) {
            echo "<option value='". $cat['ID'] ."'>". $cat['Name'] ."</option>";

          }
           ?>
          </select>
          <label>Category</label>
        </div>
              <!-- Buttton -->
        <button class="btn waves-effect waves-light" type="submit" name="status">Add
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
    $status      = $_POST['status'];
    $member      = $_POST['member'];
    $cat         = $_POST['categories'];





    $stmt=$con->prepare("INSERT INTO
                         items(Name,Description,Price,Country_Made,Status,Add_Date,Cat_ID,Member_ID)
                         VALUES(:zname,:zdesc,:zprice,:zcountry,:zstatus,now(), :zcat, :zmember)");

 $stmt->execute(array(

 'zname'   =>$name ,
'zdesc'    =>$desc,
'zprice'   =>$price,
'zcountry' =>$country,
'zstatus'  =>$status,
'zcat'     => $cat ,
'zmember'  => $member

));


} // end of post insert requst

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
