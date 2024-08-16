<?php
function menu(){
	echo file_get_contents("menu.html");
}
function footer(){
	echo file_get_contents("footer.html");
}
function printInterests(){
	echo "<div class=int>";
	$a=file_get_contents("interests.txt");
	$b=explode(";",explode("|",$a)[0]);
	$c=explode(";",explode("|",$a)[1]);
	if(sizeof($b)>sizeof($c)) $l=sizeof($b);
	else $l=sizeof($c);
	$e="";
	$r="";
	for($i=0;$i<$l;$i++){
		$e.=$b[$i]."<br>";
		$r.=$c[$i]."<br>";
	}
	echo "<div class=left><h4>books</h4>$e</div><div class=right ><h4>music</h4>$r</div></div>";
}
?>
