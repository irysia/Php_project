<?php 
namespace templates;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Pensine</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Pensine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div> 
</nav>
<div class="container">
    <div class="row">
      <div class="col my-5">
        <h1 class="display-4">Partage d'idées et d'inspirations</h1>
        <blockquote class="blockquote text-center">
          <p class="mb-0">Rejoignez la communauté! Partagez vos idées et laissez les autres les nourrir.<br> Regroupez vos pensées, inspirez vous et inspirez les autres !</p>
        </blockquote>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <form class="form-signin" method="POST" action="?action=register">
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