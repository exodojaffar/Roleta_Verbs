<?php
session_name('Private');
session_start(); 
if(isset($_GET["from"]) && ($_GET["from"] == "sorteio")){
	isset($_SESSION['verb'])?array_push($_SESSION['verb'], $_GET["word"]):$_SESSION["verb"] = array($_GET["word"]);
	session_write_close(); 
}else{
$login = false;
if(!isset($_COOKIE['login'])){
	$title = "Login";
	$page = "<form action='login.php' method='post'>
	<input type='text' name='login'>
	<input type='submit' value='Enviar'>
</form>";

}else if($_COOKIE["login"] == "adm"){
	$title = "Ja sorteados";
	$page = "<h1>Ja sorteados : </h1> </b>";
	$login = true;
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$title;?></title>
</head>
<body>

<?=$page;?>

<?php 
if ($login) {
	$sum =0;
	foreach ($_SESSION["verb"] as $verb) {
		$sum = $sum + 1;
		echo "<span style='font-size: 16px;margin: 2px;'>$verb</span> ";
		if ($sum >10) {
			$sum =0;
			echo "<br>";
		}

	} 
}
?>
</body>
</html>