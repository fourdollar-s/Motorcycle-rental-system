<!--刪除現有車輛-->
<html>
<head>
<title>刪除車輛</title>
<link rel="stylesheet" href="css/ModifyForm.css">
<script src="js/javascript.js"></script>
</head>
<body>

<div class="article">
	<h1>歐配 摩托車出租</h1>
	<h2>刪除車輛</h2>
</div>

<!--連接資料庫-->
<?php
	include("connect.php");
	$select_db=@mysql_select_db("motorrentsystem");
	$first=0;
?>
<div class="cycle">
<div class="content">
<h3>請選擇欲刪除之車輛資訊</h3>

<div id="choose">
<?php
	$sql="SELECT license FROM motor";
	$result=mysql_query($sql);
	
	echo "<form method='GET' action=''>";
		echo "<select name='m_lic'>";
		while($row=mysql_fetch_row($result))
		{
			echo "<option value='".$row[0]."'>".$row[0]."</option> ";
		}	
		echo "</select><br>";
		echo "<br><input type='submit' value='刪除' onclick='success_hint()'>";
	echo "</form>";
?>
</div>
</div>

<?php
	$m_lic=$_GET["m_lic"];
	$act2="DELETE FROM motor WHERE license = '".$m_lic."'";
	
	mysql_query($act2);
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
	alert("刪除車輛成功");
}
</script>
</body>
</html>