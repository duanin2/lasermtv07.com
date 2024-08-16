<?php
$f=unserialize(file_get_contents('articles.txt'));
foreach($f as $i){
	if($i['i']==$_GET["i"]){
		$an=file_get_contents('sample.html');
		$an=str_replace('<--{name}-->',$i["n"],$an);
		$an=str_replace('<--{menu}-->',file_get_contents('menu.html'),$an);
		$an=str_replace('<--{time}-->',date("d/m/Y H:m",$i["i"]+7200),$an);
		$an=str_replace('<--{content}-->',$i["a"],$an);
		$ft=str_replace("img/blinkies","../img/blinkies",file_get_contents("footer.html"));
		$an=str_replace('<--{footer}-->',$ft,$an);
		echo $an;
	}
}
?>
