<?php
function menu(){
	echo file_get_contents("menu.html");
}
function footer(){
	echo file_get_contents("footer.html");
}
function printInterests(){
	$a=file_get_contents("interests.txt");
	$b=explode(";",explode("|",$a)[0]);
	$c=explode(";",explode("|",$a)[1]);
	$o="<table class=int >\n<tr><td><h4>books</h3></td><td><h4>music</h4></td></tr>\n";
	for($i=0;$i<((sizeof($c)>sizeof($b)?sizeof($c):sizeof($b)));$i++){
		$o.="<tr>";
		if(sizeof($b)>$i) $o.="<td>".$b[$i]."</td>";
		else $o.="<td></td>";
		if(sizeof($c)>$i) $o.="<td>".$c[$i]."</td>";
		else $o.="<td></td>";
		$o.="</tr>";
	}
	$o.="</table>";
	echo $o;
}
?>
