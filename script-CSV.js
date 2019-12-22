// script to generate CSV file
// rename the script as 'script.js'
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
			document.getElementById(item).style.backgroundColor = "yellow";
		}
		else if(document.getElementById(item).style.backgroundColor == "yellow"){
			document.getElementById(item).style.backgroundColor = "red";
		}
		else{
			document.getElementById(item).style.backgroundColor = "green";
		}
	}
	e.stopPropogation();
}



function submit(){
	
	arr_present=[];
	arr_absent=[];
	arr_late=[];
	for (var i=1;i<=si_ze;i++){
		if (document.getElementById('box'+i).style.backgroundColor == "green"){
			arr_present.push(i);
		}
		else if (document.getElementById('box'+i).style.backgroundColor == "yellow"){
			arr_late.push(i);
		}
		else{
			arr_absent.push(i);
		}

	}
	
	var today = new Date();
	today = today.toISOString().substring(0, 10);
	var csv = 'Present,'
	for (var i=0;i<=arr_present.length-1;i++){
		csv = csv+arr_present[i]
		csv = csv+","
	}
	csv = csv+"\n"
	csv = csv+"Absent,"
	for (var i=0;i<=arr_absent.length-1;i++){
		csv = csv+arr_absent[i]
		csv = csv+","
	}
	csv = csv+"\n"
	csv = csv+"Late,"
	for (var i=0;i<=arr_late.length-1;i++){
		csv = csv+arr_late[i]
		csv = csv+","
	}
	alert(csv);
	var hiddenElement = document.createElement('a');
	hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
	hiddenElement.download = cl_as+'-'+today+'.csv';
	hiddenElement.click();
	

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
