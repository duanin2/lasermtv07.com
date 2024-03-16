<?php
//made a function to not waste resources when testing
function getRepos(){
	$c=file_get_contents("https://github.com/lasermtv07?tab=repositories");
	$s=explode("\n",$c);
	$o=[];
	foreach($s as $i){
		if(preg_match("/name codeRepository/",$i)) array_push($o,$i);
	}
	foreach($o as $k=>$i){
		$o[$k]=preg_replace("/.*lasermtv07\//","",$i);
		$o[$k]=preg_replace('/" i.*/',"",$o[$k]);
	}
	$d="[repos]\n";
	foreach($o as $i){
		$d.="$i\n";
	}
	return $d;
}

?>
