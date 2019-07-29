<?
require_once "base/functions.php";
$errors = array();
if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["pass"])){
if(strlen($_POST["login"]) < 5){
    $errors[] = "Login is less than 5 chars";
}
if(strlen($_POST["pass"]) < 6){
    $errors[] = "Password is less than 6 chars";
}
 if (userExists($_POST["login"])){
     $errors[] = "Login already exists";
 }
 if(count($errors) == 0){
     createUser($_POST["login"], $_POST["email"], $_POST["pass"]);
     mail($_POST["email"], "Registration on site", "<h1>Hello</h1>");
     header("location: login.php");
 }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <?if(count($errors) > 0){?>
        <ul>
            <?foreach($errors as $e){?>
            <li><?=$e?></li>
           <? }?>
    </ul>
    
    
   <? }?>
    <form method="POST">
        <input type="text" name="login" placeholder="Your login">
        <input type="email" name="email" placeholder="Your email">
        <input type="password" name="pass" placeholder="Your password">
        <button>Register</button>
    </form>
</body>
</html>