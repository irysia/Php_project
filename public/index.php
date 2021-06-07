<?php 
require "../vendor/autoload.php";
session_start();

use Controller\AuthController;
use Controller\ContentController;
use Controller\HomeController;
use Entity\Post;
use Entity\PostType;
use Entity\Topic;
use Entity\User;
use ludk\Persistence\ORM;

$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();

// datas
$topicsRepo = $orm->getRepository(Topic::class);
$postRepo = $orm->getRepository(Post::class);
$postTypeRepo = $orm->getRepository(PostType::class);
$usersRepo = $orm->getRepository(User::class);

$users = $usersRepo->findAll();

//display
// $action = $_GET["action"] ?? "display";
$action = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);

switch ($action) {

case 'register':
  $controller = new AuthController();
  $controller->register();
break;

case 'logout':
  $controller = new AuthController();
  $controller->logout();
break;

case 'login':
    $controller = new AuthController();
    $controller->login();
break;

case 'newTopic':
  $controller = new ContentController();
  $controller->createTopic();
break;

case 'newPost':
  $controller = new ContentController();
  $controller->createPost();
break;

case 'display':
default:
  $controller = new HomeController();
  $controller->display();
break;
}



?>