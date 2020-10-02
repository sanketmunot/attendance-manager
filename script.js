
function showAno(){
    document.getElementById('ano').style.display='block';
    document.getElementById('btnano').style.display='none';
    document.getElementById('btnlogin').style.display='none';
}

function shoLogin(){
    document.getElementById("loginform").style.display='block';
    document.getElementById('btnano').style.display='none';
    document.getElementById('btnlogin').style.display='none';
}

function regi(){
	document.getElementById("reg").style.display='block';
}
var cl_as
var si_ze

function details(){
	clas = document.getElementById('clas').value
	size = document.getElementById('size').value
	window.open("mark.html?size="+size+"&clas="+clas)
}

$(document).ready(function(){
	var url = new URL(window.location.href);
	var size = url.searchParams.get("size");
	var clas = url.searchParams.get("clas");
	
	si_ze = size
	cl_as = clas
	for (var i=1;i<=size;i++){
		$("<div id = 'box"+i+"' class='ff col-sm- btn-primary btn' style='border:2px solid white;'><b><h>"+i+"</b></h3></div>").appendTo("#parent");
	}
});


var parent = document.querySelector("#parent")

parent.addEventListener("click",dosom,false)

function dosom(e){
	if(e.target !== e.currentTarget){
		var item = e.target.id;
		if (document.getElementById(item).style.backgroundColor == "green"){
			document.getElementById(item).style.backgroundColor = "red";
		}	
		else{
			document.getElementById(item).style.backgroundColor = "green";
		}
	}
	e.stopPropogation();
}



function submit(){
	
	var arr_present=[];
	var arr_absent=[];
	
	for (var i=1;i<=si_ze;i++){
		if (document.getElementById('box'+i).style.backgroundColor == "green"){
			arr_present.push(i);
		}
		else{
			arr_absent.push(i);
		}

	}
	
	var today = new Date();
	today = today.toISOString().substring(0, 10);
	url = 'https://api.whatsapp.com/send?text=%20' +" Date : "+today+"\n"+" Class : "+cl_as+" Present : "+arr_present+" Late : "+arr_late+" Absent : "+arr_absent;
	window.open(url);
}

function absentall(){
	
	for (var i=1;i<=si_ze;i++){
		document.getElementById('box'+i).style.backgroundColor = "red";
	}
}



function presentall(){
	for (var i=1;i<=si_ze;i++){
		document.getElementById('box'+i).style.backgroundColor = "green";
	}
}

function adcmenu(){
	document.getElementById("adchead").style.display="none";
	document.getElementById('adccontent').style.display='block'
	document.getElementById('adcbtn').style.display='block'
}

function vmenu(){
	document.getElementById('vc').style.display='block';
	document.getElementById('vhead').style.display='none';
}
function usersubmit(){
	var sheet = ""
	
	for (var i=1;i<=si_ze;i++){
		if (document.getElementById('box'+i).style.backgroundColor == "green"){
			sheet += 'P ';
		}
		else{
			sheet += 'A ';
		}
		if(i<si_ze){
			sheet += ','
		}
	}
	console.log(sheet)
	window.open("newsheet.php?sheet="+sheet,"_self")
}