<?php session_start();
$pageTitle='Profile';?>
<?php include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>
<?php
if(isset($_SESSION['user'])){
$getUser=$con->prepare("SELECT * FROM user WHERE Username=?");
$getUser->execute(array($_SESSION['user']));
$info =$getUser->fetch();

$getitems=$con->prepare("SELECT * FROM items WHERE Member_ID=?");
$getitems->execute(array($info['UserID']));
$items =$getitems->fetchALL();

$g=$con->prepare("SELECT * FROM items WHERE Member_ID=?");
$g->execute(array($info['UserID']));
$i =$g->fetch();

print_r($items);
echo $info['UserID'];


?>


<h1 class="text-center">My Profile</h1>

<div class="container">
  <div class="card">
    <div class="card-header text-white bg-primary">
      My information
    </div>
    <div class="card-body">
     <ul class="list-unstyled">

    <li>
     <i class="fa fa-unlock-alt fa-fw">  </i>
      <span>login name</span>:<?php echo $info['Username']?>
    </li>

    <li>
        <i class="fa fa-envelope-o fa-fw"></i>
      <span> Email</span>:<?php echo $info['Email']?>
    </li>


  <li>
      <i class="fa fa-user fa-fw"></i>
    <span>FullName</span>:<?php echo $info['FullName']?>
  </li>

      <li>
          <i class="fa fa-calendar fa-fw"></i>
        <span>Register Date</span>:<?php echo $info['Date']?>
      </li>
        <li>
            <i class="fa fa-tags fa-fw"></i>
          <span> fevourite category</span>:
        </li>
        </ul>
    </div>
  </div>
</div>

<!--<div id="my-ads" class="my-ads block"> -->
<div class="container">
  <div class="card">
    <div class="card-header text-white bg-primary">
      My items
    </div>
    <div class="card-body">


      <?php
      if (!empty($i['Member_ID'])){
        echo'<div class="row">';

       foreach ($items as $item)
      {

      echo '<div class="col-sm-6 col-md-4 col-lg-3">';
      echo '<div class="card">';
      if ($item['Approve']==0){echo 'Not Approved';}
      echo '<img src="layout/img/haha.png" alt="Denim Jeans" style="width:100%">';
      echo '<h1><a href="items.php">'.$item['Name'].'</a></h1>';//?itemid='. $itemid['item_ID'] .'
      echo '<p class="price">'.$item['Price'].'</p>';
      echo '<div class="data">'.$item['Add_Date'].'</div>';
      echo '<a href="#" class="btn btn-primary" type="button">
      ';
      echo 'Read More...';
      echo '</a>';
      echo '</div>';
      echo '</div>';

      }
      echo'</div>';
    } else{
      echo 'Sorry There\'  No Ads To Show, Create <a href="NewItem.php">New item</a>';

    }
      ?>

    </div>
  </div>
</div>

<div class="container">
  <div class="card">
    <div class="card-header text-white bg-primary">
    Latest Comments
    </div>
    <div class="card-body">
      <?php
      //ERA CHEK BKAENAWA bzanen ba tawawe esh daka
      $stmt = $con->prepare("SELECT  comment  FROM  comments   WHERE user_id=?");
         $stmt->execute(array($info['UserID']));

         $rows=$stmt->fetchAll();

         if (!empty($comments)){
           foreach ($comments as  $comment) {

             echo '<p>'.$comment['comment'] .'</p>';
           }
         }
         else{
           echo'There\'s No Comments to Show';
         }
    ?>

    </div>
  </div>
</div>



<?php
}else{
  header('Location: login.php');
  exit();
}

 include 'include/template/footer.php' ?>
