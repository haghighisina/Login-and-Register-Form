<?php
$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url,'index.php');
$baseUrl = $url;
if (false !== $indexPHPPosition) {
    $baseUrl = substr($url,0,$indexPHPPosition);
}
if (substr($baseUrl, -1) !== '/'){
    $baseUrl .='/';
}

$route = null;
if (false !== $indexPHPPosition){
    $route = substr($url, $indexPHPPosition);
    $route = str_replace('index.php','',$route);
}

$userId = getCurrentUserId();
setcookie('userID',$userId,strtotime('+30 days'),$baseUrl);

if (!$route){
    require __DIR__.'/template/main.php';
    exit();
}
if (strpos($route,'/login') !== false){
    require __DIR__.'/action/login.php';
    require __DIR__.'/template/login.php';
    exit();
}
if (strpos($route, '/logout') !== false){
    session_regenerate_id(true);
    session_destroy();
    $redirectTarget = $baseUrl.'index.php';
    if (isset($_SESSION['redirectTarget'])){
        $redirectTarget = $_SESSION['redirectTarget'];
    }
    header("location: ".$redirectTarget);
    exit();
}
if (strpos($route, '/register') !== false){
    require __DIR__.'/action/register.php';
    require __DIR__.'/template/register.php';
    exit();
}