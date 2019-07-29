<?
session_start();
require_once "base/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Main Page</title>
    
</head>
<body>
    <?
    if(isset($_SESSION["user_id"])){
        ?>
        <h1>Hello, <?=$_SESSION["user_name"]?></h1>
        <a href="logout.php">Exit</a>
        <?
    } else{
        ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <?
    }
    ?>
</body>
</html>