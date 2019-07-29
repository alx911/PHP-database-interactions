<?
require_once "mysql.php";
 function userExists($login){
     $login = clean($login);
     $result = dbQuery("SELECT * FROM users WHERE login=$login");
     return count($result);
 }

 function createUser($login, $email, $password){
     $hash = clean($login.$password);
     $login = clean($login);
     $email = clean($email);
     dbQuery("INSERT INTO users (login, email, hash) VALUES ($login, $email, SHA2($hash, 256))");
 }

 function getUser($login, $password){
    $hash = clean($login.$password);
    $login = clean($login);
    $result = dbQuery("SELECT id, login FROM users WHERE login=$login AND hash=SHA2($hash, 256))");
    if(count($result) == 1){
        return $result[0];
    } else{
        return false;
    }
 }


 function deletePost($id){
     $id = intVal($id);
     dbQuery("DELETE FROM posts WHERE id=$id");
 }