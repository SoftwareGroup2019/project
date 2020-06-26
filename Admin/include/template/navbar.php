<ul id="dropdown1" class="dropdown-content">
  <li><a href="members.php?do=Edit&userid=<?php echo $_SESSION['ID']; ?>">Edit</a></li>
    <li><a href="../index.php">Visit Shop</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">ShipShop</a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="dashboar.php">Home</a></li>
      <li><a href="members.php">Members</a></li>
      <li><a href="Categoris.php">Categories</a></li>
      <li><a href="item.php">item</a></li>
      <li><a href="comments.php">Comment</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#" data-target="dropdown1"><?php echo $_SESSION['UserName']; ?><i class="material-icons right">expand_more</i></a></li>
    </ul>
  </div>
</nav>

<ul class="sidenav" id="mobile-demo">
  <li><a href="dashboar.php">Home</a></li>
  <li><a href="members.php">Members</a></li>
  <li><a href="Categoris.php">Categories</a></li>
  <li><a href="item.php">item</a></li>
  <li><a href="comments.php">Comment</a></li>
</ul>
