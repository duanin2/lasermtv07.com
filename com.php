<?php
function menu() {
    echo file_get_contents("menu.html");
}
function footer() {
    echo file_get_contents("footer.html");
}
function printInterests() {
    echo "<div class=\"int\">";
    $interests = explode("|", file_get_contents("interests.txt"));
    $books = explode(";", $interests[0]);
    $music = explode(";", $interests[1]);
    $length = max(sizeof($books), sizeof($music));
    $bookStr = "";
    $musicStr = "";
    for ($i = 0; $i < $length; $i++) {
        if ($i < sizeof($books)) $bookStr .= $books[$i] . "<br>";
        if ($i < sizeof($music)) $musicStr .= $music[$i] . "<br>";
    }
    echo "<div class=\"left\"><h4>books</h4>$bookStr</div><div class=\"right\"><h4>music</h4>$musicStr</div></div>";
}
