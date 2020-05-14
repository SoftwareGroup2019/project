<?php  include 'conect.php'; ?>
<?php include 'include/template/header.php';?>
<?php include 'include/template/navbar.php';?>


<div class="container Login-page">
  <h1 class="text-center">
  <span class="selected" data-class="login">login</span> |
  <span data-class="signup">signup</span>
  </h1>
  <form class="login">

  <input
   class="form-control"
   type="text"
  name="username"
  autocmplete="off"
 placeholder="Type your user name" />
  <input
   class="form-control"
   type="password"
    name="password"
     autocmplete="new-password"
     placeholder="Type your password" />
  <input
  class="btn btn-primary btn-block"
  type="submit"
  value="Login" />

  </form>

  <form class="signup">

  <input
   class="form-control"
   type="text"
  name="username"
  autocmplete="off"
 placeholder="Type your user name" />
  <input
   class="form-control"
   type="password"
    name="password"
     autocmplete="new-password"
     placeholder="Type Complex password" />
     <input
      class="form-control"
      type="password"
       name="password2"
        autocmplete="new-password"
        placeholder="Type a password again" />
     <input
      class="form-control"
      type="emali"
       name="emali"
        placeholder="Type a valid email" />
  <input
  class="btn btn-success btn-block"
  type="submit"
  value="signup" />
  </form>

  </div>





<?php include 'include/template/footer.php' ?>
