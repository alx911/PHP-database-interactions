<?
include "mysql.php";
if(isset($_POST['author']) && isset($_POST['content'])){
	$author = clean($_POST['author']);
	$content = clean($_POST['content']);
	$category = intval($_POST['category']);
	dbQuery("INSERT INTO posts (author, content, created, category) 
		VALUES ($author, $content, CURDATE(), $category)");
}
header("Location: db.php");
?>