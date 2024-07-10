var h=document.querySelectorAll("head")[0];
var s=document.getElementById("switch");
var dark=false;
if(document.cookie==""){
	document.cookie="dark=0;expires=${Date.now()+3600};path=/;SameSite=None";
}
if(document.cookie.match("dark=1")!=null) switchTheme();
function switchTheme(){
	if(!dark){
	h.innerHTML+="<link rel=stylesheet href=/dark.css>";
	dark=true;
	s.innerHTML="light ";
	document.cookie="dark=1;expires=${Date.now()+3600};path=/";
	}
	else {
	h.innerHTML+="<link rel=stylesheet href=/light.css>";
	dark=false;
	s.innerHTML="dark ";
	document.cookie="dark=0;expires=${Date.now()+3600};path=/";
	}
}
console.log(h.innerHTML);
