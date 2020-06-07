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
<div class="create-ad block">
  <div class="container">
    <div class="card">
      <div class="card-header text-white bg-primary">Create New Ad</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <!-- start of form -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">



                 <!-- name -->
                 <div class="form-group">
                   <label for="exampleFormControlInput1">Item Name</label>
                   <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of the item" name="name">
                 </div>
                <!-- ////////////////// -->

                 <!-- Description -->
                 <div class="form-group">
                   <label for="exampleFormControlInput2">Description</label>
                   <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Write short Description" name="descriptior">
                 </div>
                <!-- ////////////////// -->


               <!-- Price -->
               <div class="form-group">
                 <label for="exampleFormControlInput3">Price</label>
                 <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Write short Description" name="price">
               </div>
                <!-- ////////////////// -->

                <!-- Country -->
                <div class="form-group">
                  <label for="exampleFormControlInput4">Country</label>
                  <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="Made in ....." name="country">
                </div>
             <!-- ////////////////// -->

             <!-- start of status -->

             <div class="form-group">
              <label for="exampleFormControlSelect5">Status</label>
              <select class="form-control" id="exampleFormControlSelect5" name="esh">
                <option value="0">...</option>
                <option value="1">New</option>
                <option value="2">Like New</option>
                <option value="4">Used</option>
                <option value="5">Very Old</option>
              </select>
            </div>
             <!-- end of status -->

             <div class="form-group">
              <label for="exampleFormControlSelect6">Category</label>
              <select class="form-control" id="exampleFormControlSelect6" name="categories">
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
            </div>
                   <!-- Buttton -->
           <button type="submit" class="btn btn-primary">Submit</button>
               <!-- ////////////////// -->

           </form>
           <!-- end of form  -->
          </div>
          <div class="col-md-4">

            <div class="card">
            <img src="layout/img/haha.png" alt="Denim Jeans" style="width:100%">
            <h1></h1>
            <h5 class="text-center">Title</h5>
            <p class="text-center">0$</p>
            <!-- <a href="#" class="btn btn-primary disabled" type="button">
              Read More...
             </a> -->
            </div>
              <!-- <div class="thumbnail item-box live-preview">
                <span class="price-tag">$0</span>
                <img class="img-responsive" src="haha.png" alt="" </>
                <div class="caption">
                  <h3>Title</h3>
                  <p>Description</p>
                </div> -->

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
