<?php
$username = "";
$emailRepeat = "";
$password ="";
$passwordRepeat ="";
$errors = [];

if(isPost()){
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,'password');
    $passwordRepeat = filter_input(INPUT_POST,'passwordRepeat');

    if(false === (bool)$username){
        $errors[]="Username is empty";
    }
    if(false === (bool)$password){
        $errors[]="Password is empty";
    }
    if(true === (bool)$username){
        if(mb_strlen($username) < 4){
            $errors []="Username is too short, at least 4 characters";
        }
        if(mb_strlen($username) > 10){
            $errors []="Username is too long, up to 10 characters";
        }
        $usernameExists = usernameExists($username);
        if(true === $usernameExists){
            $errors[]="Username already exists";
        }
    }
    if(true === (bool)$password){
        if(mb_strlen($password) < 6){
            $errors[]="Password is too short";
        }
    }
    if($password !== $passwordRepeat){
        $errors[]="Passwords do not match";
    }

    $hasErrors = count($errors)> 0;
    if(false === $hasErrors){
        $created = createAccount($username,$password);
        if(!$created){
            $errors[]="Account could not be created, please try again later";
        }
        $userData = getUserDataForUsername($username);
        $_SESSION['userID'] = (int)$userData['id'];
        setcookie('userID',$userId,strtotime('+30 days'),$baseUrl);
        $redirectTarget = $_SESSION['redirectTarget'];
        header("location: ".$baseUrl."index.php");
        exit();
    }
}
$hasErrors = count($errors) > 0;


