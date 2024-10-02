<?php
include "com.php";
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>blog :: lasermtv</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        .rss {
            display: inline-block;
            float: right;
        }

        /*
        @media (max-width:560px){
            position:absolute;
            top:500px;
        }
        */
    </style>
</head>

<body>
    <?php menu(); ?>
    <main>

        <h1>
            <a href="rss.xml"><img class="rss" src="img/rss.png" /></a>
            blog
        </h1>
        <p>Professional blog of lasermtv. <a href="login.php">Log in</a> to administration.</p>

        <?php
        $posts = array_reverse(scandir("posts"));
        $sortedPosts = [];
        foreach ($posts as $post) {
            $sortedPosts[explode("-", $post)[0]] = $post;
        }
        ksort($sortedPosts);
        $month = -1;
        $year = -1;
        foreach (array_reverse($sortedPosts) as $post) {
            $link = $post;
            if ($post != "." && $post != "..") {
                $post = explode(".", $post)[0];
                $date = explode("-", $post)[0];
                $post = str_replace("$date-", "", $post);
                $post = str_replace("-", " ", $post);
                if (date("m", $date + 7200) != $month) {
                    echo "<h3>" . date("M Y", $date + 7200) . "</h3>";
                    $year = date("y", $date + 7200);
                    $month = date("m", $date + 7200);
                } elseif (date("y", $date + 7200) != $year) {
                    echo "<h3>" . date("m y", $date + 7200) . "</h3>";
                    $month = date("m", $date + 7200);
                    $year = date("y", $date + 7200);
                }
                echo "> <b><a href=\"posts/$link\" >";
                echo "$post</a></b> - <i>" . date("d/m/Y H:m", $date + 7200) . " (CEST)</i><br>";
            }
        }
        ?>
        <?php footer(); ?>
    </main>
</body>

</html>
