<?
include 'mysql.php';
$id = intval($_GET['id']);
dbQuery("DELETE FROM posts WHERE id=$id");
header("Location: db.php");
?>