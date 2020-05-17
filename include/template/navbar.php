<div class="upper-bar">
  <div class="container">
    <?php
      if(isset($_SESSION['user'])){
        echo ' Welcome ' .$_SESSION['user'];
       $userStatus =   checkUserStatus($_SESSION['user']);
         if( $userStatus == 1){
           echo 'Your Membership Need TO Activiate By Admin';
         }
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

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #74b9ff;">
  <a class="navbar-brand" href="#">ShipShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>


        <?php
          foreach (getCat() as $cat)
          {
          ?>
           <!-- mn bam shewaza krditm -->
          <li class="nav-item">
            <a class="nav-link" href="categories.php?pageid=<?php echo $cat['ID'];?>&pagename=<?php echo str_replace(' ','-',$cat['Name']); ?>">
              <?php echo $cat['Name'];?>
            </a>
          </li>

          <?php

           }
        ?>

        <li>
          <a class="nav-link" href="Admin/index.php">Admin</a>
        </li>
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
