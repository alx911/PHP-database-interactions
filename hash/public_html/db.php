<?
include "mysql.php";

if(isset($_GET['category'])){
	$category = intval($_GET['category']);
	$result = dbQuery("SELECT posts.id, posts.author, posts.content, posts.created, categories.name AS category_name, categories.color
		FROM posts JOIN categories ON posts.category=categories.id 
		WHERE category=$category ORDER BY created DESC ");
} else {
	$result = dbQuery("SELECT posts.id, posts.author, posts.content, posts.created, categories.name AS category_name, categories.color
		FROM posts JOIN categories ON posts.category=categories.id 
		ORDER BY created DESC ");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SQl Sandbox</title>
	<style>
		*{
			box-sizing: border-box;
		}
		.container{
			width: 1000px;
			margin: 20px auto;
		}
		.flex{
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		form{
			width: 500px;
			border: 1px solid #ededed;
			border-radius: 10px;
			padding: 20px;
		}
		form input,
		form textarea{
			width: 100%;
			margin-bottom: 20px;
		}
		article{
			padding: 20px;
			margin-bottom: 20px;
		}
	</style>
	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
</head>
<body>
	<?
	$categories = dbQuery("SELECT id, name FROM categories");
	?>
	<div class="container">
		<div class="flex">
			<form method="POST" action="create.php">
				<input type="text" name="author">
				<textarea name="content"></textarea>
				<script>
                        CKEDITOR.replace( 'content' );
                </script>
				<select name="category">
					<? foreach($categories as $c) { ?>
						<option value="<?=$c["id"]?>"><?=$c["name"]?></option>
					<? } ?>
				</select>
				<button>Сохранить</button>
			</form>
			<form>
				<select name="category">
					<? foreach($categories as $c) { ?>
						<option value="<?=$c['id']?>"
							<?if($_GET['category'] == $c['id']) {?> selected<? } ?> 
							><?=$c['name']?></option>
					<? } ?>
				</select>
				<button>Фильтровать</button>
				<a href="db.php">Сбросить</a>
			</form>
		</div>
		<? foreach($result as $post) { ?>
			<article style="background-color: <?=$post["color"]?>">
				<h2>Автор: <?=$post["author"]?></h2>
				<p><?=$post["content"]?></p>
				<p class="created"><?=$post["created"]?>, <?=$post["category_name"]?></p>
				<a href="delete.php?id=<?=$post['id']?>">Удалить</a>
			</article>
		<? } ?>
	</div>
</body>
</html>