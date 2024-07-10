<!DOCTYPE HTML>
<html>
<head>
	<title>laserm :: admin</title>
</head>
<body style=heigth:100% >
<?php
session_start();
if(!isset($_SESSION["login"])){
	echo "<b>Error: not logged in";
	die();
}
$t=file_get_contents("articles.txt");
$t=unserialize($t);
$unique=true;
$artin=-1;
foreach($t as $k=>$i){
	if($i["i"]==$_GET["i"]){
		$unique=false;
		$artin=$k;
	}
}
?>
<a href="admin.php">&lt;&lt; back to admin</a>
<main style=width:80%;margin-left:auto;margin-right:auto; >
<h1>new post</h1>
<form method=POST >
<input type=text name=n style=width:100%;height:30px; placeholder=title
value="<?php if(!$unique) echo $t[$artin]["n"];?>"
><br><br>
<textarea style=width:100%;margin:auto;height:70vw name=art >
<?php if(!$unique) echo $t[$artin]["a"];?>
</textarea>
<br><input type=submit name=s >
</form>
<?php
	if(isset($_POST["s"])){
		$n=$_POST["n"];
		$a=$_POST["art"];
		$a=str_replace("files/","../files/",$a);
		if($n=="" || $a==""){
			echo "<b>Error:Neither article nor.. name can be empty</b>";
			die();
		}
		if($unique){
			$id=time();
			array_push($t,["i"=>$id,"n"=>$n,"a"=>$a]);
		}
		else{
			$t[$artin]["n"]=$n;
			$t[$artin]["a"]=$a;
		}
		$s=serialize($t);
		file_put_contents("articles.txt",$s);
		if($unique) header("location:newpost.php?i=$id");
	}
?>
</main>
		<script type="text/javascript" src="./tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
			tinymce.init(
				{
					language : 'cs',
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
