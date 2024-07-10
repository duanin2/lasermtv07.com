<?php
include "com.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>blog :: lasermtv</title>
	<link rel=stylesheet href=style.css />
</head>
<body>
<?php menu(); ?>
<main>
	<h1>lorem ipsum</h1>
	<p>Professional blog of lasermtv. <a href=login.php >Log in</a> to administration.</p>
<?php
foreach(scandir("posts") as $i){
	if($i!="." && $i!=".."){

		echo "> <b><a href=posts/$i >";
		$i=explode(".",$i)[0];
		$i=str_replace("-"," ",$i);
		echo"$i</a></b><br>";
	}
}
?>
	<?php footer(); ?>
</main>
</body>
</html>
