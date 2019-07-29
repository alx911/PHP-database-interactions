<?
require_once "base/functions.php";
$errors = array();
if(isset($_POST["login"]) && isset($_POST["pass"])){
if(!userExists($_POST["login"])){
    $errors[]="User dont exist";
} else {
    $user = getUser($_POST["login"], $_POST["pass"]);
    if($user){
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["login"];
        header("Location:index.php");
        exit();
    } else {
        $errors[]="Wrong Password";
    }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
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
<input type="text" name="password" placeholder="Your password">
<button>Enter</button>
<a href="register.php">Register account</a>
    </form>
</body>
</html>