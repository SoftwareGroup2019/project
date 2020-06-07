<?php
ob_start();
 session_start();
$pageTitle='Crete New Ad';?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
if(isset($_SESSION['user'])){
?>
<h1 class="text-center">Crete New Ad</h1>
<div class="Crete-Ad">
  <div class="card">
    <div class="card-header text-white bg-primary">
      Crete New Ad
           </div>
              <div class="card-body">
               <div class="row">
              <div class="col-md-8">
                <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">


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
                   <select name="esh">
                     <option value="0">...</option>
                     <option value="1">New</option>
                     <option value="2">Like New</option>
                     <option value="4">Used</option>
                     <option value="5">Very Old</option>
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
                 </div>
               <div class="col-md-4">
           <div class="thumbnail item-box">
             <span class="price-tag"></span>
             <img class="img-responsive" src="img.png" alt=""/>
             <h3>Title</h3>
             <p> Description </p>

           </div>
  </div>
    </div>
      </div>
}else{
  header('Location: login.php');
  exit();
}

 include 'include/template/footer.php' ?>
