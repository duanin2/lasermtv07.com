<?php
include "rss.php";
function name2filename($name) {
    $output = "";
    $words = explode(" ", $name);
    foreach ($words as $key => $value) {
        if ($key != sizeof($words) - 1) $output .= "$value-";
        else $output .= "$value.html";
    }
    $output = str_split($output);
    foreach ($output as $key => $value) {
        if ($value == "/") $output[$key] = "\\";
    }
    return implode("", $output);
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>laserm :: admin</title>
    <style>
        main {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <a href="index.php">&lt;&lt; back to home</a>
    <main>
        <h1>admin panel</h1>
        <?php
        session_start();
        if ($_GET["d"] == "true") {
            unset($_SESSION["login"]);
        }
        if (!isset($_SESSION["login"])) {
            echo "<b>Error: not logged in<br>Do you want to <a href=login.php >log in?<a/>";
            die();
        }
        ?>
        <b><a href="newpost.php">New Post!</a> - <a href="admin.php?d=true" />Log out</a>
            - <a href="files.php">Manage Files</a> - <a href="admin.php?gen=true">Generate static HTML</a> - <a href="interests.php">Change interests</a>
        </b>
        <hr />
        <?php
        $articles = unserialize(file_get_contents("articles.txt"));
        if ($_GET["gen"] == "true") {
            // deletes directory content
            foreach (scandir("posts") as $value) {
                unlink("posts/" . $value);
            }
            foreach ($articles as $article) {
                $filename = name2filename($article["n"]);
                $filename = $article["i"] . "-" . $filename;
                $content = file_get_contents('sample.html');
                $content = str_replace('<--{name}-->', $article["n"], $content);
                $content = str_replace('<--{menu}-->', file_get_contents('menu.html'), $content);
                $content = str_replace('<--{time}-->', date("d/m/Y H:m", $article["i"] + 7200), $content);
                $content = str_replace('<--{content}-->', $article["a"], $content);
                $footer = str_replace("img/blinkies", "../img/blinkies", file_get_contents("footer.html"));
                $content = str_replace('<--{footer}-->', $footer, $content);

                file_put_contents("posts/$filename", $content);
            }
            genRSS();
            header("location: admin.php");
        }
        if (isset($_GET["del"])) {
            $newArticles = [];
            foreach ($articles as $article) {
                if ($article["i"] != $_GET["del"]) array_push($newArticles, $article);
            }
            $articles = $newArticles;
            file_put_contents("articles.txt", serialize($articles));
            header("location: admin.php");
        }
        foreach ($articles as $article) {
            echo "&gt; <a href=\"newpost.php?i=" . $article["i"] . "\" ><b style=\"font-size: 1.4em\">" . $article['n'] . "</b></a>";
            echo " - <a href=\"admin.php?del=" . $article["i"] . "\" >Delete</a> <a target=\"_new\" href=\"preview.php?i=" . $article["i"] . "\" >Preview page</a><br>";
        }
        ?>
    </main>
</body>

</html>
