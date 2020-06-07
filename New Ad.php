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
<div class ="create-ad block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-headding">Create New Ad</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-8">
            <!-- start of form -->
            <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">


              <!-- start of row -->
              <div class="row">

                 <!-- name -->
                <div class="input-field col s12">
                  <i class="material-icons prefix">local_grocery_store</i>
                  <input id="icon_prefix" type="text" name="name" class="live-name" >
                  <label for="icon_prefix">Item Name</label>
                </div>
                <!-- ////////////////// -->

                 <!-- Description -->
                <div class="input-field col s12">
                  <i class="material-icons prefix">receipt</i>
                  <input id="icon_prefix" type="text" name="descriptior" class="live-desc" >
                  <label for="icon_prefix">Description</label>
                </div>
                <!-- ////////////////// -->


               <!-- Price -->
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_balance</i>
                  <input id="icon_prefix" type="text" name="price" class="live-price" >
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
          <div class="col-md-4">
<div class="thumbnail item-box live-preview">
  <span class="price-tag">$0</span>
  <img class="img-responsive" src="haha.png" alt="" </>
  <div class="caption">
    <h3>Title</h3>
    <p>Description</p>
  </div>

</div>
          </div>
          </div>
          </div>
          </div>
          </div>
        </div>
  <?php
}else{
  header('Location: login.php');
  exit();
}

 include 'include/template/footer.php' ?>
