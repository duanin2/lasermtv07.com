<?php
ob_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>files</title>
    <style>
        main {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <a href="admin.php">&lt;&lt;back to admin</a>
    <main>
        <h1>file management</h1>
        <?php
        session_start();
        if (!$_SESSION["login"]) {
            echo "<b>Must be logged in to continue.<br>Do you wanna <a href=login.php >log in?</a><br>";
            die();
        }
        ?>
        <h2>Upload a file</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="f" id="f" /><br>
            <input type="submit" name="s" />
        </form>
        <?php
        if (isset($_POST["s"])) {
            $file = $_FILES["f"];
            if ($file["type"] != "") {
                // var_dump($_FILES["f"]);
                move_uploaded_file($file["tmp_name"], "files/" . $file["name"]);
                echo "<b>File uploaded</b>";
            } else {
                echo "<b>Error: No file to be uploaded!</b>";
            }
        }
        ?>
        <hr />
        <h2>Manage files</h2>
        <?php
        if ($_GET["del"] ?? false) {
            if (file_exists("files/" . $_GET["del"])) unlink("files/" . $_GET["del"]);
            header("location: files.php");
        }
        foreach (scandir("files") as $file) {
            if ($file != "." && $file != "..") {
                echo "&gt; <b>$file</b> - <a href=\"files.php?del=$file\" >Delete</a><br>";
            }
        }
        ?>
    </main>
</body>
<html>
