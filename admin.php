<?php
include "rss.php";
function name2filename($s){
	$o="";
	$t=explode(" ",$s);
	foreach($t as $k=>$i){
		if($k!=sizeof($t)-1)$o.="$i-";
		else $o.="$i.html";
	}
	$o=str_split($o);
	foreach($o as $k=>$i){
		if($i=="/") $o[$k]="\\";
	}
	return implode("",$o);
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>laserm :: admin</title>
	<style>
	main {
		width:80%;
		margin-left:auto;
		margin-right:auto;
	}
	</style>
</head>
<body>
<a href=index.php >&lt;&lt; back to home</a>
<main>
<h1>admin panel</h1>
<?php
session_start();
if($_GET["d"]=="true"){
	unset($_SESSION["login"]);
}
if(!isset($_SESSION["login"])){
	echo "<b>Error: not logged in<br>Do you want to <a href=login.php >log in?<a/>";
	die();
}
?>
<b><a href=newpost.php >New Post!</a> - <a href=admin.php?d=true />Log out</a>
 - <a href=files.php>Manage Files</a> - <a href=admin.php?gen=true >Generate static HTML</a> - <a href=interests.php >Change interests</a>
</b>
<hr />
<?php
$t=unserialize(file_get_contents("articles.txt"));
if($_GET["gen"]=="true"){
	//deletes directory content
	foreach(scandir("posts") as $i){
		unlink("posts/".$i);
	}
	foreach($t as $i){
		$nn=name2filename($i["n"]);
		$nn=$i["i"]."-".$nn;
		$an=file_get_contents('sample.html');
		$an=str_replace('<--{name}-->',$i["n"],$an);
		$an=str_replace('<--{menu}-->',file_get_contents('menu.html'),$an);
		$an=str_replace('<--{time}-->',date("d/m/Y H:m",$i["i"]+7200),$an);
		$an=str_replace('<--{content}-->',$i["a"],$an);
		$ft=str_replace("img/blinkies","../img/blinkies",file_get_contents("footer.html"));
		$an=str_replace('<--{footer}-->',$ft,$an);

		file_put_contents("posts/$nn",$an);
	}
	genRSS();
	header("location:admin.php");
	
}
if(isset($_GET["del"])){
	$o=[];
	foreach($t as $i){
		if($i["i"]!=$_GET["del"]) array_push($o,$i);
	}
	$t=$o;
	file_put_contents("articles.txt",serialize($t));
	header("location: admin.php");
}
foreach($t as $i){
	echo "&gt; <a href=newpost.php?i=".$i["i"]." ><b style=font-size:1.4em>".$i['n']."</b></a>";
	echo " - <a href=admin.php?del=".$i["i"]." >Delete</a> <a target=_new href=preview.php?i=".$i["i"]." >Preview page</a><br>";
	}
?>
</main>
</body>
</html>
