<!--查看顧客資料-->
<html>
<head>
<title>查詢顧客資料</title>
<link rel="stylesheet" href="css/CustomerInfo.css">
</head>
<body>

<div class="article">
	<h1>歐配 摩托車出租</h1>
	<h2>查詢顧客資料</h2>
</div>

<!--連接資料庫-->
<?php
	include("connect.php");
	$select_db=@mysql_select_db("motorrentsystem");
?>

<div id="content">
<h3>請選擇所想查詢的顧客之身分證字號</h3>
<div id="choose">
<?php
	$sql="SELECT ID FROM renter";
	$result=mysql_query($sql);
	
	echo "<form method='GET' action=''>";
		echo "<select name='c_id'>";
		while($row=mysql_fetch_row($result))
		{
			echo "<option value='".$row[0]."'>".$row[0]."</option> ";
		}	
		echo "</select><br>";
		echo "<br><input type='submit' value='查詢'>";
	echo "</form>";
?>
</div>

<div id="show">
<?php
	$id_no=$_GET["c_id"];
	//echo "<p>".$id_no."</p>"
	$detail="SELECT * FROM renter WHERE ID='".$id_no."'";
	echo "<table>";
		echo "<tr id='row1'>";
			echo "<td>身分證字號</td>";
			echo "<td>姓名</td>";
			echo "<td>性別</td>";
			echo "<td>生日</td>";
			echo "<td>連絡電話</td>";
			echo "<td>電子郵件</td>";
			echo "<td>備註</td>";
		echo "</tr>";
		echo "<tr id='row2'>";
			$row=mysql_fetch_row(mysql_query($detail));
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";	
		echo "</tr>";
	echo "</table>";
?>
</div>

<div class="url">
	<a href="EmployeeHome.php"><img src="img/home.png"></a><!--回到員工首頁-->
	<a href="ModifyForm.php"><img src="img/checkmark.png"></a><!--修改訂單狀態-->
	<a href="DeleteForm.php"><img src="img/clipboard.png"></a><!--刪除訂單-->
	<a href="CustomerInfo.php"><img src="img/group.png"></a><!--查詢顧客資料-->
	<a href="AddMotor.php"><img src="img/add.png"></a><!--新增車輛-->
	<a href="DeleteMotor.php"><img src="img/delete.png"></a><!--刪除車輛-->
</div> 

</div>

</body>
</html>