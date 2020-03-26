<?php
  session_start();
  $pageTitle = "Categoris";
  if(isset($_SESSION['UserName']))
  {
   include 'include/template/header.php';
   include 'include/template/navbar.php';
?>


<div class="container">

<h3>Add New Categoris</h3>

<div class="row">

  <div class="input-field col s8">
  <input id ="icon_prefix" type="text" class="validate" name="name">
  <label > name </label>
  </div>


  <div class="input-field col s8">
  <input id ="icon_telephone" type="text" class="validate" name="Description">
  <label> Description </label>
  </div>

  <div class="input-field col s8">
  <input id ="icon_telephone" type="text" class="validate" name="Ordering">
  <label> Ordering</label>
  </div>

  <div class="input-field col s12">
  <t>Vsible</t>
  <form action="#">
    <p>
      <label>
        <input name="group1" type="radio" checked />
        <span>Yes</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" />
        <span>no</span>
      </label>
    </p>
  </div>

  <div class="input-field col s12">
      <t>Allow Comnenting</t>
  <form action="#">
    <p>
      <label>
        <input name="group2" type="radio" checked />
        <span>Yes</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group2" type="radio" />
        <span>No</span>
      </label>
    </p>
  </div>

  <div class="input-field col s12">
      <t>Allow Ads</t>
  <form action="#">

    <p>
    <label>
        <input name="group4" type="radio" checked />
        <span>Yes</span>
      </label>

    </p>
    <p>
      <label>
        <input name="group4" type="radio" />
        <span>no</span>
      </label>
    </p>
  </div>
<div class="input-field col s12">
<a class="waves-effect waves-light btn">button</a>
</div>
<?php
     include 'include/template/footer.php';
  }
  else
  {

    header('Location: index.php');
    exit();
  }
 ?>
