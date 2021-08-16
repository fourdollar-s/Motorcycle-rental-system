//js

//modifyForm
function changePage(id){
	if(id=="notPick"){
		document.getElementById("np").style.display = "none";
	}
	else if(id=="notReturn"){
		document.getElementById("nr").style.display = "none";
	}
}

//EmployeeHome
function showHint0(){
	document.getElementById("hint").style.display = "block";
	document.getElementById("hint").innerHTML="回到員工首頁。";
}
function showHint1(){
	document.getElementById("hint").style.display = "block";
	document.getElementById("hint").innerHTML="若顧客完成領車/還車的動作，可在此修改訂單狀態。";
}
function showHint2(){
	document.getElementById("hint").style.display = "block";
	document.getElementById("hint").innerHTML="若有意外狀況，可在此刪除已存在的訂單。";
}
function showHint3(){
	document.getElementById("hint").style.display = "block";
	document.getElementById("hint").innerHTML="可在此查看顧客詳細資料。";
}
function showHint4(){
	document.getElementById("hint").style.display = "block";
	document.getElementById("hint").innerHTML="可在此新增店內車輛。";
}
function showHint5(){
	document.getElementById("hint").style.display = "block";
	document.getElementById("hint").innerHTML="可在此刪除店內車輛。";
}
function hideHint(){
	 document.getElementById("hint").style.display = "none";
}

//DeleteForm
function changePage(id){
	if(id=="notPick"){
		document.getElementById("np").style.display = "none";
	}
	else if(id=="notReturn"){
		document.getElementById("nr").style.display = "none";
	}
}

//DeleteMotor
function deleteSuccess(){
	document.getElementById("hide").style.display = "block";
	document.getElementById("hide").innerHTML="刪除成功";
}
function hideInfo(){
	 document.getElementById("hide").style.display = "none";
}
