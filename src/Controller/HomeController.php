<?php 
namespace Controller;


class HomeController{

    public function display(){
        global $topicsRepo;
        global $postRepo;
        global $postTypeRepo;
         // search
        $topics = [];
        $posts = $postRepo->findAll();
        $postTypes = $postTypeRepo->findAll();


        if (isset($_GET['search'])) {
            $topics = $topicsRepo->findBy(array("content" => '%' . $_GET['search'] . '%'));
        } else {
            $topics = $topicsRepo->findAll();
        }

        include "../templates/display.php";
        }

    }


?>