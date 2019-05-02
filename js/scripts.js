function getSub(){
	alert ('Спасибо за подписку!');
}

function isright(obj){
if (obj.value === null || obj.value === ""){	
obj.value=value;
}
if (obj.value>5){
obj.value=5; }
if (obj.value<1){	
obj.value=1;
}
obj.value=value;
}

function addLikes(){

var span = document.getElementById('likes');
numbSpan= span.innerHTML;
numbSpan=parseInt(numbSpan)+1;
document.getElementById('likes').innerHTML=numbSpan;
}
