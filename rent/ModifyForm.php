<html>
<head>
<title>修改訂單狀態</title>
<link rel="stylesheet" href="css/ModifyForm.css">
</head>

<body>
	<?php 
		include("connect.php");
		$select_db=@mysql_select_db("motorrentsystem");
	?>

<div class="article">
	<h1>歐配 摩托車出租</h1>
	<h2>修改訂單狀態</h2>
</div>

<div class="cycle">
<div class="content">
	<h3>請選擇欲修改的訂單</h3>
	<?php
		echo "<form method='POST' action=''>";
		echo "<select name='order_no'>";
		$act="SELECT `number` FROM `form` WHERE `return` = 0";
		$result=mysql_query($act);
		while($row=mysql_fetch_row($result)){
			echo "<option value='".$row[0]."'>".$row[0]."</option>";
		}
		echo "</select>";
		echo "<h3>請選擇欲修改成的結果</h3>";
		echo "<input type='radio' name='status' value='1'>已領車";
		echo "<input type='radio' name='status' value='2'>已還車";
		
		echo "<br><br><input type='submit' value='修改' onclick='success_hint()'>";
		echo "</form>";
	?>
</div>
</div>

<?php
	$no=$_POST["order_no"];
	$choice=$_POST["status"];
	if($choice==1){
		$mod1="UPDATE form SET take = 1 WHERE number='".$no."'";
		mysql_query($mod1);
	}
	else if($choice==2){
		$mod2="UPDATE `form` SET `return` = 1 WHERE `number`='".$no."'";
		mysql_query($mod2);
	}
?>

<div class="url">
	<a href="EmployeeHome.php"><img src="img/home.png"></a><!--回到員工首頁-->
	<a href="ModifyForm.php"><img src="img/checkmark.png"></a><!--修改訂單狀態-->
	<a href="DeleteForm.php"><img src="img/clipboard.png"></a><!--刪除訂單-->
	<a href="CustomerInfo.php"><img src="img/group.png"></a><!--查詢顧客資料-->
	<a href="AddMotor.php"><img src="img/add.png"></a><!--新增車輛-->
	<a href="DeleteMotor.php"><img src="img/delete.png"></a><!--刪除車輛-->
</div> 

<script>
function success_hint(){
	alert("修改成功");
}
</script>
</body>

</html>