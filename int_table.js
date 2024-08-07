//uh it works i guess
var oc=document.querySelector('.int').innerHTML;
var cont=document.querySelector('.int').innerText.split('\n');
cont.shift();
cont.shift();
cont.shift();
cont.shift();
console.log(cont);
let b="<tr><td><h3>books</h3></td></tr>\n";
let m="<tr><td><h3>music</h3></td></tr>\n";

for(let i of cont){
	let t=i.split("\t");
	if(t[0]!=="") b+="<tr><td>"+t[0]+"</td></tr>\n";
	if(t[1]!=="") m+="<tr><td>"+t[1]+"</td></tr>\n";
	
}
if(window.innerWidth<=560) document.querySelector('.int').innerHTML=b+m;
else document.querySelector('.int').innerHTML=oc;
window.addEventListener('resize', function(event) {
    if(window.innerWidth<=560) document.querySelector('.int').innerHTML=b+m;
	else document.querySelector('.int').innerHTML=oc;
}, true);
//console.log(b);
//console.log(m);
