<?php 
namespace Controller;


class HomeController{

    public function display(){
        global $topicsRepo;
         // search
        $topics = [];
        if (isset($_GET['search'])) {
            $topics = $topicsRepo->findBy(array("content" => '%' . $_GET['search'] . '%'));
        } else {
            $topics = $topicsRepo->findAll();
        }

        include "../templates/display.php";
        }

    }


?>