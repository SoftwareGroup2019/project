<div class="upper-bar">
  <div class="container">
    <?php





      if(isset($_SESSION['user']))
      {

        $getUser=$con->prepare("SELECT image,GrupID FROM user WHERE Username=?");
        $getUser->execute(array($_SESSION['user']));
        $info =$getUser->fetch();

        ?>
        <div class="dropdown show">
          <img src="Admin/layout/admin_img/<?php echo $info['image']; ?>" class="rounded-circle " width="40px" height="40px">

  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php  echo $_SESSION['user']?>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li ><a class="dropdown-item" href="Profile.php"> My Profile</a></li>
    <li ><a class="dropdown-item" href="logout.php">Logout</a></li>
    <li ><a class="dropdown-item" href="Profile.php">My item</a></li>
    <li ><a class="dropdown-item" href="NewItem.php">New Item</a></li>

  </div>
</div>

        <?php
      }
      else {

      ?>
    <a href="login.php">
       <span class="pull-right">Login/signup</span>
       <br>
     </a>
   <?php } ?>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">ShipShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                $getcate=$con->prepare("SELECT * FROM categories");
                $getcate->execute();
                $cate =$getcate->fetchALL();
                foreach ($cate as $c)
                {
                  ?>

                    <a class="dropdown-item" href="categories.php?pageid=<?php echo $c['ID'];?>&pagename=<?php echo $c['Name'];?>"><?php echo $c['Name']; ?></a>

                    <?php
                }
                 ?>


              </div>

  <?php

  if (empty($_SESSION['user'])) {

  }
  else {
    if ($info['GrupID'] == 1)
     {
    ?>
    <li>
      <a class="nav-link" href="Admin/index.php">Dashboard</a>
    </li
    <?php
      }
  }


   ?>



    </ul>



    <!-- kaka era dast kary nakretn, bvaya bv bv -->
    <!-- ####################################### -->
    <!-- <form class="form-inline my-2 my-lg-0">
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Name
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Edit</a>
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </div>
    </form> -->
    <!-- ################################################## -->
    <!-- dast kari maka please era lo tamasha krdna bas bvya -->
  </div>
</nav>
