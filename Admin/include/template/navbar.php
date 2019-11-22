<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="members.php$d0=Edit&userid =<$php echo $SESSION['ID']$>">Edit</a></li>
  <li><a href="#!">Settings</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">ShipShop</a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="Home.html">Home</a></li>
        <li><a href="Members.html">Members</a></li>
      <li><a href="Categories.html">Categories</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="logout.php" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
<ul class="sidenav" id="mobile-demo">
  <li><a href="Home.html">Home</a></li>
    <li><a href="Members.html">Members</a></li>
  <li><a href="Categories.html">Categories</a></li>
</ul>
