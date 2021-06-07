<?php 
namespace Controller;

use Entity\Post;
use Entity\Topic;

Class ContentController{

    public function createTopic(){
       
        global $topicsRepo;
        // global $usersRepo;
        global $manager;
        $topicsRepo->findAll();
        // $users = $usersRepo->findAll();

        if(isset($_SESSION['user'])){
            $newTopic = new Topic(); 
            $newTopic->topic = $_POST['topicTitle'];
            $newTopic->desc = $_POST['topicDesc'];
            $newTopic->created_at = $_POST['creationDate'];
            $newTopic->user = $_SESSION['user'];
            //code creation thème
            $manager->persist($newTopic);
            $manager->flush();
            header('Location: /display');
        }
        

    }

    public function createPost(){
        //code creation post
        global $postRepo;
        global $manager;
        global $postTypeRepo;
        $postRepo->findAll();
        
        if(isset($_SESSION['user'])){

            
            $postType = $postTypeRepo->find($_POST['postType']);

            $newPost = new Post(); 
            $newPost->title = $_POST['postTitle'];
            $newPost->postType = $postType;
            $newPost->created_at = $_POST['postCreationDate'];
            $newPost->content = $_POST['postContent'];
            $newPost->desc = $_POST['postDesc'];
            // $newPost->topic = $this->newTopic->id;
            $newPost->user = $_SESSION['user'];
            //code creation thème
            $manager->persist($newPost);
            $manager->flush();
            header('Location: /display');
        }
    }

}

?>