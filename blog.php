<?php
include "com.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>blog :: lasermtv</title>
	<link rel=stylesheet href=style.css />
	<style>
	.rss {
		display:inline-block;
		float:right;
	}
	/*@media (max-width:560px){
	position:absolute;
	top:500px;
	}*/
	</style>
</head>
<body>
<?php menu(); ?>
<main>

	<h1>
		<a href=rss.xml><img class=rss src=img/rss.png  /></a>
		blog
	</h1>
	<p>Professional blog of lasermtv. <a href=login.php >Log in</a> to administration.</p>
	
<?php
$s=array_reverse(scandir("posts"));
$n=[];
foreach($s as $i){
	$n[explode("-",$i)[0]]=$i;
}
ksort($n);
$m=-1;
$y=-1;
foreach($n as $i){
	$o=$i;
	if($i!="." && $i!=".."){
		$i=explode(".",$i)[0];
		$t=explode("-",$i)[0];
		$i=str_replace("$t-","",$i);
		$i=str_replace("-"," ",$i);
		if(date("m",$t+7200)!=$m){
			echo "<h3>".date("M Y",$t+7200)."</h3>";
			$y=date("y",$t+7200);
			$m=date("m",$t+7200);
		}
		elseif(date("y",$t+7200)!=$y){
			echo "<h3>".date("m y",$t+7200)."</h3>";
			$m=date("m",$t+7200);
			$y=date("y",$t+7200);
		}
		echo "> <b><a href=posts/$o >";
		echo"$i</a></b> - <i>".date("d/m/Y h:m",$t+7200)." (CEST)</i><br>";
	}
}
?>
	<?php footer(); ?>
</main>
</body>
</html>
