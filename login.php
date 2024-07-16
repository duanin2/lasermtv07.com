<!DOCTYPE HTML>
<html>
<head>
	<title> admin login</title>
	<style>
	main {
		width:80%;
		margin-left:auto;
	}
	</style>
</head>
<body>
<main>
	<h1>Admin login</h1>
	<form method=POST >
		<b>Login:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> <input type=text name=login ><br>
		<b>Password:</b> <input type=password name=pass ><br>
		<input type=submit name=s >
	</form>
<?php
session_start();
if($_SESSION["login"]){echo "<b>Already logged in</b>";header("location:admin.php");die();}
if(isset($_POST["s"])){
	$l=explode(";",trim(file_get_contents("login.txt")))[0];
	$p=explode(";",trim(file_get_contents("login.txt")))[1];
	if($l==$_POST["login"] && password_verify($_POST["pass"],$p)){
		echo "<b>Logged in sucessfully</b>";
		$_SESSION["login"]=true;
		header("location:admin.php");
	}
	else {
		echo "<b>Bad credentials</b>";
		die();
	}
}
?>
</main>
</body>
</html>
