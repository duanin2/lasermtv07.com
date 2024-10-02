<?php
$articles = unserialize(file_get_contents('articles.txt'));
foreach ($articles as $article) {
    if ($article['i'] == $_GET["i"]) {
        $page = file_get_contents('sample.html');
        $page = str_replace('<--{name}-->', $i["n"], $page);
        $page = str_replace('<--{menu}-->', file_get_contents('menu.html'), $page);
        $page = str_replace('<--{time}-->', date("d/m/Y H:m", $i["i"] + 7200), $page);
        $page = str_replace('<--{content}-->', $i["a"], $page);
        $footer = str_replace("img/blinkies", "../img/blinkies", file_get_contents("footer.html"));
        $page = str_replace('<--{footer}-->', $footer, $page);
        echo $page;
    }
}
