<?php
	$login = isset($_POST["login"])?$_POST["login"]:"false";
	if ($login == "ferias") {
		setcookie("login", "adm", time()+3600);
	}
	// 301 Moved Permanently
header("Location: /adm.php",TRUE,301);
?>