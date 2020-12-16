<?php
$isPost = isPost();
$username = "";
$password = "";
$errors = [];
$hasErrors = false;
if ($isPost){

    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST,'password');

    if (false === (bool)$username){
        $errors[]="Username is empty";
    }
    if (false === (bool)$password){
        $errors[]="Password ist leer";
    }
    $userData = getUserDataForUsername($username);
    if ((bool)$username && 0 === count($userData)){
        $errors[]="Username does not exist";
    }
    if ((bool)$password &&
        isset($userData['password']) &&
        false === password_verify($password, $userData['password'])
    ){
        $errors[]="Password is wrong";
    }
    if (0 === count($errors)){
        $_SESSION['userID'] = (int)$userData['id'];
        setcookie('userID',$userId,strtotime('+30 days'),$baseUrl);
        $redirectTarget = $_SESSION['redirectTarget'];
        header("location: ".$baseUrl."index.php");
        exit();
    }
}
$hasErrors = count($errors) > 0;