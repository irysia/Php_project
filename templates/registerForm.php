<?php 
namespace templates;
include __DIR__ . "/include/header.php";

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
        <form class="form-signin" method="POST" action="/register">
          <h2 class="form-signin-heading">S'inscrire</h2>
          <?php
          if (isset($errorMsg)) {
            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
          }
          ?>
          <input type="text" class="form-control my-2" name="nickname" placeholder="Nickname (4 characters)" required="" autofocus="" />
          <input type="text" class="form-control my-2" name="avatar" placeholder="url image de profil"  autofocus="" />
          <input type="password" class="form-control my-2" name="password" placeholder="Password (8 characters)" required="" />
          <label>Retype password:</label>
          <input type="password" class="form-control my-2" name="passwordRetype" placeholder="Password" required="" />
          <button class="btn btn-lg btn-info btn-block my-3" type="submit">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>