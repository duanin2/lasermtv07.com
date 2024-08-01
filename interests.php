<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lasermtv :: interests</title>
	<style>
		main {
			width:80%;
			margin-left:auto;
			margin-right:auto;
		}
		li {
			list-style-type:"> ";
		}
	</style>
</head>
<body>
<?php
$data=explode("|",file_get_contents('interests.txt'));
$books=explode(";",$data[0]);
$music=explode(";",$data[1]);
session_start();
if(!isset($_SESSION['login'])){
	echo "<b>Error must be logged in</b>";
	die();
}
?>
<a href=admin.php>&lt;&lt; go back to admin</a>
	<main>
		<h2>interests</h2>
		<h3>books</h3>
		<form method=POST>
		<ul>
<?php
foreach($books as $k=>$i){
if($i!="") echo "<li><input type=checkbox name=cb$k checked > <input type=text name=ib$k value=\"$i\"/>";
}
?>
			<li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text name=newb placeholder="new post here"/></li>
		</ul>
		<input type=submit name=bs >
		</form>
<?php
//does.. like.. stuffs..
function writeChanges($y){
	$towrite=[];
	foreach($_POST as $k=>$i){
		$t=str_split($k);
		if($t[0]=='c' && $t[1]==$y){
			array_shift($t);
			array_shift($t);
			$t=implode("",$t);
			array_push($towrite,$t);
		}
	}
	$o="";
	foreach($_POST as $k=>$i){
		$t=str_split($k);
		if($t[0]=='i' && $t[1]==$y){
			array_shift($t);
			array_shift($t);
			$t=implode("",$t);
			if(in_array($t,$towrite)) $o.="$i;";
		}
	}
	if(isset($_POST["new$y"]) && $_POST["new$y"]!=0) $o.=$_POST["new$y"];
	return $o;
}
if(isset($_POST["bs"])){
	file_put_contents("interests.txt",writeChanges('b')."|".implode(";",$music));
	header('location:interests.php');
}
?>
		<h3>music</h3>
		<form method=POST>
		<ul>
<?php
foreach($music as $k=>$i){
if($i!="") echo "<li><input type=checkbox name=cm$k checked > <input type=text name=im$k value=\"$i\"/>";
}
?>
			<li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text name=newm placeholder="new post here"/></li>
		</ul>
		<input type=submit name=ms >
		</form>
<?php
if(isset($_POST["ms"])){
	file_put_contents("interests.txt",implode(";",$books)."|".writeChanges('m'));
	header('location:interests.php');
}

?>
	</main>
</body>
</html>
