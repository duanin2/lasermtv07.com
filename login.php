<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>admin login</title>
    <style>
        main {
            width: 80%;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <main>
        <h1>Admin login</h1>
        <form method="POST">
            <b>Login:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" name="login"><br>
            <b>Password:</b><input type="password" name="pass"><br>
            <input type="submit" name="s">
        </form>
        <?php
        if ($_SESSION["login"] ?? false) {
            echo "<b>Already logged in</b>";
            header("location: admin.php");
            die();
        }
        if (isset($_POST["s"])) {
            $loginInfo = explode(";", trim(file_get_contents("./login.txt")));
            $username = $loginInfo[0];
            $password = $loginInfo[1];
            if ($username == $_POST["login"] && password_verify($_POST["pass"], $password)) {
                echo "<b>Logged in sucessfully</b>";
                $_SESSION["login"] = true;
                header("location: admin.php");
            } else {
                echo "<b>Bad credentials</b>";
                die();
            }
        }
        ?>
    </main>
</body>

</html>
