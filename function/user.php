<?php
function getCurrentUserId():int{
    $userId = random_int(0,time());
    if (isset($_COOKIE['userID'])){
        $userId = (int)$_COOKIE['userID'];
    }
    if (isset($_SESSION['userID'])){
        $userId = (int)$_SESSION['userID'];
    }
    return $userId;
}
function getUserDataForUsername(string $username):array{
    $sql = "SELECT id,password FROM user WHERE username= :username";

    $statement = getDB()->prepare($sql);
    if (false === $statement){
        return [];
    }
    $statement->execute([
        ':username' => $username
    ]);
    if (0 === $statement->rowCount()){
        return [];
    }
    $row = $statement->fetch();
    return $row;
}
function createAccount(string $username,string $password):bool{
    $password = password_hash($password,PASSWORD_DEFAULT);

    $sql ="INSERT INTO user SET username=:username,password=:password";

    $statement = getDb()->prepare($sql);
    if(false === $statement){
        return false;
    }

    $data = [
        ':username'=>$username,
        ':password'=>$password
    ];
    $statement->execute( $data );

    $affectedRows = $statement->rowCount();

    return $affectedRows > 0;

}
function usernameExists(string $username):bool{
    $sql ="SELECT 1 FROM user WHERE username=:username";
    $statement = getDb()->prepare($sql);
    if(false === $statement){
        return false;
    }
    $statement->execute([
        ':username'=>$username
    ]);
    return (bool)$statement->fetchColumn();
}
function isLoggedIn():bool{
    return isset($_SESSION['userID']);
}