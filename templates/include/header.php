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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- login/logout -->
            <form class="navbar-nav ml-auto form-inline my-2 my-lg-0 ">
            <?php 
            if (isset($_SESSION['user'])) {
            ?>  
                <p class="mr-2 text-light my-2 my-sm-0 mr-2">Bienvenu(e) <?=$_SESSION['user']->nickname ? $_SESSION['user']->nickname : null ?> !</p>
                <a class="nav-link btn btn-outline-info text-info my-2 my-sm-0 mr-2" href="?action=logout" role="button">Logout</a>
            <?php 
            }else{
            ?>
                <a class="nav-link btn btn-outline-info text-info my-2 my-sm-0 mr-2" href="?action=login" role="button">Login</a>
                <a class="nav-link btn btn-info text-light my-2 my-sm-0 mr-2" href="?action=register" role="button">Sign In</a>
            <?php 
            }
            ?>
            </form>
        </div>
    </div>
    
</nav>

<!-- header -->
<header class="intro">    
    <div class="container">
        <h1 class="display-4 title">Partage d'idées et d'inspirations</h1>
    </div>
</header>
