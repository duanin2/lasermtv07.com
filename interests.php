<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>lasermtv :: interests</title>
    <style>
        main {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        li {
            list-style-type: "> ";
        }
    </style>
</head>

<body>
    <?php
    $data = explode("|", file_get_contents('interests.txt'));
    $books = explode(";", $data[0]);
    $music = explode(";", $data[1]);
    session_start();
    if (!isset($_SESSION['login'])) {
        echo "<b>Error must be logged in</b>";
        die();
    }
    ?>
    <a href="admin.php">&lt;&lt; go back to admin</a>
    <main>
        <h2>interests</h2>
        <h3>books</h3>
        <form method="POST">
            <ul>
                <?php
                foreach ($books as $key => $value) {
                    if ($value != "") echo "<li><input type=\"checkbox\" name=\"cb$key\" checked > <input type=\"text\" name=\"ib$key\" value=\"$value\"/>";
                }
                ?>
                <li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="newb" placeholder="new post here" /></li>
            </ul>
            <input type="submit" name="bs">
        </form>
        <?php
        //does.. like.. stuffs..
        function writeChanges($y) {
            $toWrite = [];
            foreach ($_POST as $key => $value) {
                $chars = str_split($key);
                if ($chars[0] == 'c' && $chars[1] == $y) {
                    array_shift($chars);
                    array_shift($chars);
                    $chars = implode("", $chars);
                    array_push($toWrite, $chars);
                }
            }
            $output = "";
            foreach ($_POST as $key => $value) {
                $chars = str_split($key);
                if ($chars[0] == 'i' && $chars[1] == $y) {
                    array_shift($chars);
                    array_shift($chars);
                    $chars = implode("", $chars);
                    if (in_array($chars, $toWrite)) $output .= "$value;";
                }
            }
            if (isset($_POST["new$y"]) && $_POST["new$y"] != 0) $output .= $_POST["new$y"];
            return $output;
        }
        if (isset($_POST["bs"])) {
            file_put_contents("interests.txt", writeChanges('b') . "|" . implode(";", $music));
            header('location: interests.php');
        }
        ?>
        <h3>music</h3>
        <form method="POST">
            <ul>
                <?php
                foreach ($music as $key => $value) {
                    if ($value != "") echo "<li><input type=checkbox name=cm$key checked > <input type=text name=im$key value=\"$value\"/>";
                }
                ?>
                <li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text name=newm placeholder="new post here" /></li>
            </ul>
            <input type="submit" name="ms">
        </form>
        <?php
        if (isset($_POST["ms"])) {
            file_put_contents("interests.txt", implode(";", $books) . "|" . writeChanges('m'));
            header('location: interests.php');
        }
        ?>
    </main>
</body>

</html>
