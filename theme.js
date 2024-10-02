let head = document.querySelector("head");
let themeSwitch = document.getElementById("switch");
let isDark = false;
if (document.cookie == "") {
	document.cookie = "dark=" + window.matchMedia("prefers-color-scheme: light").matches ? "0" : "1" + ";expires=${Date.now()+3600};path=/;SameSite=None";
}
if (document.cookie.match("dark=1") != null) switchTheme();
function switchTheme() {
	if (!isDark) {
		head.innerHTML += "<link rel=stylesheet href=/dark.css>";
		dark = true;
		themeSwitch.innerHTML = "light ";
		document.cookie = "dark=1;expires=${Date.now()+3600};path=/";
	} else {
		head.innerHTML += "<link rel=stylesheet href=/light.css>";
		isDark = false;
		themeSwitch.innerHTML="dark ";
		document.cookie="dark=0;expires=${Date.now()+3600};path=/";
	}
}
console.log(head.innerHTML);
