<!--查看顧客資料-->
<html>
<head>
<title>新增車輛</title>
<link rel="stylesheet" href="css/AddMotor.css">
</head>
<body>

<div class="article">
	<h1>歐配 摩托車出租</h1>
	<h2>新增車輛</h2>
</div>

<!--連接資料庫-->
<?php
	include("connect.php");
	$select_db=@mysql_select_db("motorrentsystem");
?>

<div class="cycle">
<div class="content">
	<h3>請填入欲新增之車輛資訊</h3>
	<form method="GET" action="">
	<table>
	<tr><td><label for="license">車牌號碼：</label></td>
	<td><input type="text" name="license"></td></tr><br>
	<tr><td><label for="price">租借價格：</label></td>
	<td><input type="text" name="price"></td></tr><br>
	<tr><td><label for="cc">CC數：</label></td>
	<td><input type="text" name="cc"></td></tr><br>
	<tr><td><label for="type">車型：</label></td>
	<td><input type="text" name="type"></td></tr><br>
	</table>
	<br>
	<input type="submit" value="新增" onclick="success_hint()">
	</form>	
</div>
</div>

<?php
	$license=$_GET["license"];
	$price=$_GET["price"];
	$cc=$_GET["cc"];
	$type=$_GET["type"];
	$status=0;
	$flag=0;
	$adder="INSERT INTO motor VALUES ('".$license."','".$price."','".$cc."','".$type."','".$status."')";
	mysql_query($adder);
?>

<div class="url">
	<a href="EmployeeHome.php"><img src="img/home.png"></a><!--回到員工首頁-->
	<a href="modifyForm.php"><img src="img/checkmark.png"></a><!--修改訂單狀態-->
	<a href="DeleteForm.php"><img src="img/clipboard.png"></a><!--刪除訂單-->
	<a href="CustomerInfo.php"><img src="img/group.png"></a><!--查詢顧客資料-->
	<a href="AddMotor.php"><img src="img/add.png"></a><!--新增車輛-->
	<a href="DeleteMotor.php"><img src="img/delete.png"></a><!--刪除車輛-->
</div> 
</div>
<script>
function success_hint(){
	alert("新增車輛成功");
}
</script>
</body>
</html>