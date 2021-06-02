<?php 
namespace Controller;

use Entity\User;

Class AuthController{

    public function login(){
        global $usersRepo;
        if (isset($_POST['nickname']) && isset($_POST['password'])) {
            $criteriaLogin = [
                "nickname" => $_POST['nickname'],
                "password" => $_POST['password']
            ];
            $usersFound = $usersRepo->findBy($criteriaLogin);
            // $userId = GetUserIdFromUserAndPassword($_POST['username'], $_POST['password']);
            if (count($usersFound) === 1) {
                $_SESSION['user'] = $usersFound[0];
                header('Location: /display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/loginForm.php";
            }
        } else {
            include "../templates/loginForm.php";
        }
    }

    public function logout(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: /display');
    }

    public function register(){
        global $usersRepo;
        global $manager;
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
              header('Location: /display');
            }
        } else {
            include "../templates/registerForm.php";
        }
    }

}



?>