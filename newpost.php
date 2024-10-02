<!DOCTYPE HTML>
<html>

<head>
    <title>laserm :: admin</title>
</head>

<body style="height: 100%">
    <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        echo "<b>Error: not logged in";
        die();
    }
    $articles = file_get_contents("articles.txt");
    $articles = unserialize($articles);
    $unique = true;
    $articleName = -1;
    foreach ($articles as $name => $content) {
        if ($content["i"] == $_GET["i"]) {
            $unique = false;
            $articleName = $name;
        }
    }
    ?>
    <a href="admin.php">&lt;&lt; back to admin</a>
    <main style="width: 80%; margin-left: auto; margin-right: auto;">
        <h1>new post</h1>
        <form method="POST">
            <input type="text" name="n" style="width: 100%; height: 30px;" placeholder="title"
                value="<?php if (!$unique) echo $articles[$articleName]["n"]; ?>"><br><br>
            <textarea style="width: 100%; margin: auto; height: 70vw;" name="art">
                <?php if (!$unique) echo $articles[$articleName]["a"]; ?>
            </textarea>
            <br><input type=submit name=s>
            <a href="preview.php?i=<?php echo $_GET["i"]; ?>" target="_new">
                Preview
            </a>
        </form>
        <?php
        if (isset($_POST["s"])) {
            $name = $_POST["n"];
            $article = $_POST["art"];
            $article = str_replace("files/", "../files/", $article);
            if ($name == "" || $article == "") {
                echo "<b>Error:Neither article nor.. name can be empty</b>";
                die();
            }
            if ($unique) {
                $id = time();
                array_push($articles, ["i" => $id, "n" => $name, "a" => $article]);
            } else {
                $articles[$articleName]["n"] = $name;
                $articles[$articleName]["a"] = $article;
            }
            $newArticles = serialize($articles);
            file_put_contents("articles.txt", $newArticles);
            if ($unique) header("location: newpost.php?i=$id");
            else header("location:newpost.php?i=" . $_GET["i"]);
        }
        ?>
    </main>
    <script type="text/javascript" src="./tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            language: 'cs',
            selector: 'textarea[name=art]',
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
        });
    </script>

</body>

</html>
