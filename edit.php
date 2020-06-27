
<?php session_start();
$pageTitle='Show Items';
?>

<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php


  $id = $_GET['userid'];


  $stmt = $con->prepare("SELECT * FROM user WHERE UserID = ? LIMIT 1");

  //execute query

      $stmt->execute(array($id));

  //fetch the data
      $row=$stmt->fetch();


  if($_SERVER['REQUEST_METHOD'] == 'POST')

  {
$id = $_GET['userid'];
      $pass;

$user = $_POST['Username'];
$fullname = $_POST['FullName'];
$newpass = $_POST['newpass'];
$oldpass = $_POST['oldpassword'];
$hashedPass =sha1($newpass);
$email = $_POST['email'];

if (empty($_POST['newpass'])) {
  $pass = $_POST['oldpassword'];
}
else {
  $newpass = $_POST['newpass'];
  $pass = sha1($newpass);
}



$itemiamge = time() . '-' . $_FILES["image"]["name"];
// For image upload
   $target_dir = "Admin/layout/admin_img/";
   $target_file = $target_dir . basename($itemiamge);

   if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
   {
     $stmt=$con ->prepare("UPDATE
                          user
                           SET
                            Username = ?
                             ,FullName = ?
                             ,Email = ?
                             ,password = ?
                             ,image = ?
                           WHERE UserID = ?");
     $stmt->execute(array(

                           $user,
                           $fullname,
                           $email,
                           $pass,
                           $itemiamge,
                           $id));
                    header("Location:profile.php");


}
else
{

  $stmt=$con ->prepare("UPDATE
                       user
                        SET
                         Username = ?
                          ,FullName = ?
                          ,Email = ?
                          ,password = ?
                        WHERE UserID = ?");
  $stmt->execute(array(

                        $user,
                        $fullname,
                        $email,
                        $pass,
                        $id));

                     header("Location:profile.php");

}



}
?>


<div class="container Login-page">

<h1 class="text-center" style="margin-bottom:20px;">Edit User</h1>


  <!--start signup Form -->
  <form action="edit.php?userid=<?php echo $row['UserID']; ?>" method="post" enctype="multipart/form-data">

 <input type="hidden" name="userid" value="<?php echo $userid ?>" />

  <div class="input-container">
    <input
     class="form-control"
     type="text"
    name="Username"
    autocmplete="off"
   placeholder="Type your user name"
   value="<?php echo $row['Username']; ?>"
    />
     </div>
     <div class="input-container">
       <input
        class="form-control"
        type="text"
       name="FullName"
       autocmplete="off"
      placeholder="Type your FullName"
      value="<?php echo $row['FullName']; ?>"
       />
        </div>
        <input id="password" type="hidden" name="oldpassword" class="validate" value="<?php echo $row['password'];?>">
   <div class="input-container">
    <input
     class="form-control"
     type="password"
      name="newpass"
       autocmplete="new-password"
       placeholder="Type Complex password"
     />
    </div>

          <div class="input-container">
       <input
        class="form-control"
        type="email"
         name="email"
          placeholder="Type a valid email"
           value="<?php echo $row['Email'];?>"
          />
    </div>
                    <!-- image -->
                    <div class="input-container">
                      <input type="file" name="image" value="Choose an image" class="form-control image">
                    </div>
                 <!-- ////////////////// -->



  <div class="input-container">
        <input
        class="btn btn-success btn-block"
        name ="signup"
        type="submit"
        value="signup"
        />
  </div>
  <br>
  <div class="input-container" style="text-align:center;">
    <img src="Admin/layout/admin_img/<?php echo $row['image']; ?>" style="width: 100px" class="img-thumbnail image-preview" alt="">
  </div>
    </form>
    <!-- end pf signup Form -->

</div>










<?php include 'include/template/footer.php' ?>
