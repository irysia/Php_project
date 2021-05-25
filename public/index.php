<?php 
require "../vendor/autoload.php";
session_start();

use Entity\Post;
use Entity\PostType;
use Entity\Topic;
use Entity\User;
use ludk\Persistence\ORM;

$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();

// datas
$postRepo = $orm->getRepository(Post::class);
$posts = $postRepo->findAll();

$postTypeRepo = $orm->getRepository(PostType::class);
$postTypes = $postTypeRepo->findAll();

$topicsRepo = $orm->getRepository(Topic::class);

$usersRepo = $orm->getRepository(User::class);
$users = $usersRepo->findAll();

//display
$action = $_GET["action"] ?? "display";

switch ($action) {

case 'register':
  if (isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
    $errorMsg = NULL;
    $newUserCriteria = [
      "nickname" => $_POST['nickname'],
      "password" => $_POST['password']
    ];
    $newUser = $usersRepo->findBy($newUserCriteria);

    if(count($newUser) === 1 ){
      $errorMsg = "Nickname already used.";
    } else if ($_POST['password'] !== $_POST['passwordRetype']){
      $errorMsg = "Passwords are not the same.";
    } else if (strlen(trim($_POST['password'])) < 8) {
      $errorMsg = "Your password should have at least 8 characters.";
    } else if (strlen(trim($_POST['nickname'])) < 4) {
      $errorMsg = "Your nickame should have at least 4 characters.";
    }else if ($_POST['avatar']){
      $avatarContentChecked = htmlentities($_POST['avatar']);
    }else if(!$_POST['avatar']){
      $avatarContentChecked = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRw_-kumocJoiPLqY8L91X6fgePCbdXfxUUPg&usqp=CAU";
    }
    
    if($errorMsg){
      include "../templates/registerForm.php";
    }else {
      $userToRegister = new User;
      $userToRegister->nickname = $_POST['nickname'];
      $userToRegister->password = $_POST['password'];
      $userToRegister ->avatarUrl =  $avatarContentChecked;
      $manager->persist($userToRegister);
      $manager->flush();
      $_SESSION ['user'] = $userToRegister;
      header('Location: ?action=display');
    }
  } else {
    include "../templates/registerForm.php";
  }
break;

case 'logout':
  if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
  }
  header('Location: ?action=display');
  break;
break;

case 'login':
    if (isset($_POST['nickname']) && isset($_POST['password'])) {
      $criteriaLogin = [
        "nickname" => $_POST['nickname'],
        "password" => $_POST['password']
      ];
      $usersFound = $usersRepo->findBy($criteriaLogin);
      // $userId = GetUserIdFromUserAndPassword($_POST['username'], $_POST['password']);
      if (count($usersFound) === 1) {
        $_SESSION['user'] = $usersFound[0];
        header('Location: ?action=display');
      } else {
        $errorMsg = "Wrong login and/or password.";
        include "../templates/loginForm.php";
      }
    } else {
      include "../templates/loginForm.php";
    }
break;

case 'newTopic':
break;

case 'newPost':
break;

case 'display':
default:
  // search
  if (isset($_GET['search'])) {
    $topics = $topicsRepo->findBy(array("content" => '%' . $_GET['search'] . '%'));
  } else {
    $topics = $topicsRepo->findAll();
  }

  include "../templates/display.php";
break;
}



?>