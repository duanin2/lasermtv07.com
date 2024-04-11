<!DOCTYPE HTML>
<html>
<head>
	<title>lasermtv07.com :: blog</title>
	<link rel="stylesheet" href="style.css" />
	<style>
		code {
			background-color: #D7D7D7;
	}
	pre code {
		display: block;
	}
</head>
<body>
<?php echo file_get_contents("menu.html"); ?>
<main>
<?php
$i=(isset($_GET["i"])) ? $_GET["i"] : "";
$f=file_get_contents(__DIR__."/blog/$i");
require 'vendor/autoload.php';
$pd=new Parsedown();
$f=$pd->text($f);
echo $f;
?>
</main>
</body>
</html>
