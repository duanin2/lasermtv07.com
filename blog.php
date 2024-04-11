<?php
function debloat($i){
	$o=mb_str_split($i);
		foreach($o as $k=>$i){
			if($i=="-") $o[$k]=" ";
		}
	$o=implode("",$o);
	$o=preg_replace("/\.md/","",$o);
	return $o;
}
foreach( scandir(__DIR__."/blog") as $i){
	if($i!="." && $i!=".." && $i!="README.md"){
		echo "<h3><a href=post.php?i=$i>".debloat($i)."</a></h3>";
	}
}
