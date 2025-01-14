<?php
include "com.php"
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>laserm :: home</title>
	<link rel=stylesheet href=style.css />
</head>
<body>
<?php menu();?>
	<main>
<img src=img/misa.png class=left style=margin-right:10px; height=200px; />	
<h2>Hi,</h2>
<p>
and welcome to my website. My name is <b>lasermtv07</b> aka <b>Michal Chmelar</b>, and I am a 17 year old Czech programming student and enthusiast.
This is my homepage on the World Wide Web. Here, I will publish my blog and host some stuff, including my own software.
</p>
<p>
I am currently studying programming - focus backend web development on a <a href=https://en.wikipedia.org/wiki/Vocational_school >trade school</a> in.. well.. I am not doxxing myself here. However, I am comfortable saying I live in central Moravia, specifically in the <a href=https://en.wikipedia.org/wiki/Han%C3%A1 >Hana</a> region of Moravia. I am in the third year of highschool.</p>
<h3>My socials</h3>
<p>

<iframe src=https://github-readme-stats.vercel.app/api?username=lasermtv07&hide=issues,prs&theme=dracula style=float:right; width=450px;></iframe>
I&nbsp;guess it's good to have it here
<ul>
<li><b><a href=https://github.com/lasermtv07 >github</a></b></li>
<li><b><a href=https://spacehey.com/profile?id=2559698 >spacehey</a></b></li>
<li><b><a href=https://www.youtube.com/@laserm6113 >YouTube</a></b> - <i>inactive</i></li>
<li><b><a href=https://lasermtv.itch.io/ >itch.io</a></b></li>
<li><b>email:</b> <a href=mailto:lasermtv07@volny.cz>lasermtv07@volny.cz</a></li>
</ul>
<h3>My interests</h3>
<p>
I'm not very focused; sorta flying from one hyperfixation to another. However, here, I'll list some stuffs that I'm persistently interested in:
<ul>
	<li><b>Backend web development</b> - well, no surprises here, I am <i>"majoring"</i> in it.</li>
	<li><b>Esoteric programming languages</b> - one of my weirder obessions in CS. I particularly like the <a href=https://en.wikipedia.org/wiki/Brainfuck >brainfuck</a>. I have also made an <a href=https://github.com/lasermtv07/caesarlang >esolang</a> on my own.</li>
<li><b>Theory of automatas and grammars</b> -  Area of math and comp sci studying the propertioes of automatons, formal languages and formal grammars. I'm still learning, but I'm trying ;). <a href=https://en.wikipedia.org/wiki/Automata_theory >Link to Wikipedia</a> if someone is curious</li>
<li><b>Linux/Unix</b> - I am a die-hard Linux user. This website is hosted on linux (though that is not <a href=https://w3techs.com/technologies/details/os-linux >surprising</a>) and I daily drive linux on all my devices.</li>
</ul>
</p>
<h3>Hardware</h3>
<p>
While I dont think it's particularly interesting:
<ul>
<li><b>CPU:</b> Ryzen 5 1600</li>
<li><b>GPU:</b> NVIDIA GeForce GTX 1660</li>
<li><b>RAM: </b>16Gb</li>
</ul>
</p>
<h3>Software</h3>
<p>
Here, I will list the software I use. It is good to mention that I am a <b>distro hopper</b> so this list may not be up to date.
<ul>
<li><b>OS:</b> Void Linux</li>
<li><b>Window Manager:</b> i3</li>
<li><b>Web Browser:</b> Firefox</li>
<li><b>Terminal emulator:</b> Alacritty</li>
<li><b>Text editor:</b> Vim</li>
</ul>
The dotfiles can be found on my <a href=https://github.com/lasermtv07/dotfiles >github</a>.</p>
<h3>interests</h3>
<?php
printInterests();
?>
<br>
<?php footer(); ?>
</main>
</body>
</html>
