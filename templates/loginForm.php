<?php 
namespace templates;
include 'include/header.php';
?>

<div class="container">
    <div class="row">
      <div class="col my-5">
        <blockquote class="blockquote text-center">
          <p class="mb-0">Rejoignez la communauté! Partagez vos idées et laissez les autres les nourrir.<br> Regroupez vos pensées, inspirez vous et inspirez les autres !</p>
        </blockquote>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <form class="form-signin" method="POST" action="?action=login">
          <h2 class="form-signin-heading">Bon retour parmis nous !</h2>
          <?php
          if (isset($errorMsg)) {
            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
          }
          ?>
          <input type="text" class="form-control my-3" name="nickname" placeholder="Nickname" required="" autofocus="" />
          <input type="password" class="form-control my-3" name="password" placeholder="Password" required="" />
          <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>

