<html>
<head>
	<title>員工首頁</title>
	<link rel="stylesheet" href="css/EmployeeHome.css">
	<script src="js/javascript.js"></script><!--注意script有結束標籤-->
</head>
<body>
	
	<div class="article">
		<h1>歐配 摩托車出租</h1>
		<h2>員工首頁</h2>
	</div>

	<div class="choice">
	<a href="EmployeeHome.php" onmouseover="showHint0()" onmouseout="hideHint()"><img src="img/home.png"></a><!--回到員工首頁-->
	<a href="ModifyForm.php" onmouseover="showHint1()" onmouseout="hideHint()"><img src="img/checkmark.png"></a><!--修改訂單狀態-->
	<a href="DeleteForm.php" onmouseover="showHint2()" onmouseout="hideHint()"><img src="img/clipboard.png"></a><!--刪除訂單-->
	<a href="CustomerInfo.php" onmouseover="showHint3()" onmouseout="hideHint()"><img src="img/group.png"></a><!--查詢顧客資料-->
	<a href="AddMotor.php" onmouseover="showHint4()" onmouseout="hideHint()"><img src="img/add.png"></a><!--新增車輛-->
	<a href="DeleteMotor.php" onmouseover="showHint5()" onmouseout="hideHint()"><img src="img/delete.png"></a><!--刪除車輛-->
	</div>

	<p id="hint"></p>

</body>
</html>