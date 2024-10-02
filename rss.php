<?php
function genRSS() {
    $output = <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
	<title>lasermtv07.com blog</title>
	<author>lasermtv07</author>
	<description>A blog of a Czech teenager</description>
	<language>en-us</language>
EOF;
    foreach (scandir('posts') as $post) {
        if ($post !== "." && $post != "..") {
            $output .= "\n	<item>";
            $link = $post;
            $temp = explode("-", $post);
            array_shift($temp);
            $post = implode(" ", $temp);
            $post = preg_replace("/\..*$/", "", $post);
            $output .= "\n		<title>$post</title>\n";

            $output .= "		<link>http://" . $_SERVER["HTTP_HOST"] . "/posts/$link</link>";
            $output .= "\n		<description>A post about $post</description>";

            $output .= "\n		<pubDate>";
            $output .= date("d/m/Y H:m", explode("-", $link)[0] + 7200);
            $output .= "</pubDate>";
            $output .= "\n	</item>";
        }
    }
    $output .= "\n</channel>\n</rss>";
    file_put_contents("rss.xml", $output);
}
