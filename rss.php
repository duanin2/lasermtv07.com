
<?php
function genRSS(){
$o=<<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
	<title>lasermtv07.com blog</title>
	<author>lasermtv07</author>
	<description>A blog of a Czech teenager</description>
	<language>en-us</language>
EOF;
foreach(scandir('posts') as $i){
	if($i!=="." && $i!=".."){
		$o.= "\n	<item>";
		$l=$i;
		$t=explode("-",$i);
		array_shift($t);
		$i=implode(" ",$t);
		$i=preg_replace("/\..*$/","",$i);
		$o.= "\n		<title>$i</title>\n";

		$o.= "		<link>http://".$_SERVER["HTTP_HOST"]."/posts/$l</link>";
		$o.= "\n		<description>A post about $i</description>";

		$o.= "\n		<pubDate>";
		$o.= date("d/m/Y H:m",explode("-",$l)[0]+7200);
		$o.= "</pubDate>";
		$o.= "\n	</item>";
	}
}
$o.= "\n</channel>\n</rss>";
file_put_contents("rss.xml",$o);
}
?>
