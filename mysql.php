<?
$connection = null;
function dbConnect($dbname, $pass){
	global $connection;
	$connection = new PDO("mysql:host=localhost;dbname=$dbname", $dbname, $pass);
}
function dbQuery($query){
	global $connection;
	return $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
}
function clean($text){
	global $connection;
	return $connection->quote($text);
}
dbconnect("ch69085_qwerty", "qwerty1234");
?>