<?php
ob_start();
 session_start();
$pageTitle='Create New Item';?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
if(isset($_SESSION['user'])){
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $formErrors = array();
$name          = filter_var($_POST['name']/*,FILER_SANITZE_STING*/);
$desc          = filter_var($_POST['descriptior']/*,FILER_SANITZE_STING*/);
$price         = filter_var($_POST['price']/*,FILER_SANITZE_NUMBER_INT*/);
$country       = filter_var($_POST['country']/*,FILER_SANITZE_NUMBER_INT*/);
$status        = filter_var($_POST['esh']/*,FILER_SANITZE_STING*/);
$category      = filter_var($_POST['categories']/*,FILER_SANITZE_NUMBER_INT*/);

if (strlen($name) < 4){
  $formErrors[] = 'Item Title Must Be At Least 4 Characters';

}
if (strlen($desc) < 10){
  $formErrors[] = 'Item Description Must Be At Least 10 Characters';

}
if (strlen($country) < 2){
  $formErrors[] = 'Item country Must Be At Least 2 Characters';

}
if (empty($price) ){
  $formErrors[] = 'Item Price Must Be Not Empty';

}
if (empty($status) ){
  $formErrors[] = 'Item Status Must Be Not Empty';

}
if (empty($category) ){
  $formErrors[] = 'Item categories Must Be Not Empty';

}
  if  (empty($formErrors)){
    $name        = $_POST['name'];
    $desc        = $_POST['descriptior'];
    $price       = $_POST['price'];
    $country     = $_POST['country'];
    $status         = $_POST['esh'];
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
'zcat'     => $category ,
'zmember'  => $_SESSION['uid']

));


} // end of post insert requst

    if ($_SESSION['user']){
     echo 'Item Added';
  }
  }
?>
<h1 class="text-center">Create New Item</h1>
<div class="create-ad block">
  <div class="container">
    <div class="card">
      <div class="card-header text-white bg-primary">Crete New Item</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <!-- start of form -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">



                 <!-- name -->
                 <div class="form-group">
                   <label for="exampleFormControlInput1">Item Name</label>
                   <input type="text" class="form-control live-name" id="exampleFormControlInput1" placeholder="Name of the item" name="name">
                 </div>
                <!-- ////////////////// -->

                 <!-- Description -->
                 <div class="form-group">
                   <label for="exampleFormControlInput2">Description</label>
                   <input type="text" class="form-control live-desc" id="exampleFormControlInput2" placeholder="Write short Description" name="descriptior">
                 </div>
                <!-- ////////////////// -->


               <!-- Price -->
               <div class="form-group">
                 <label for="exampleFormControlInput3">Price</label>
                 <input type="text" class="form-control live-price" id="exampleFormControlInput3" placeholder="Put Price" name="price">
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

            <div class="card live-preview">
            <img src="layout/img/haha.png" alt="Denim Jeans" style="width:100%">
            <h1></h1>
            <div class="caption">
            <h4 class="text-center">0$</h4>
            <h5 class="text-center">Title</h5>
            <h6 class="text-center">Description</h6>
            </div>
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
          <!-- Start Looping Through Errors -->
          <?php
if(! empty($formErrors)){
  foreach ($formErrors as $error) {
    echo '<div class="alert alert-danger ">'. $error .'</div>';

  }
}
           ?>

          <!-- End Looping Through Errors -->

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
