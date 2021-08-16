<!DOCTYPE html>
<html>

<head>
<title>刪除租借單</title>
<link rel="stylesheet" href="css/ModifyForm.css">
</head>

<body>
	<!--連接資料庫-->
	<?php
		include("connect.php");
		$select_db=@mysql_select_db("motorrentsystem");
	?>

	<div class="article">
		<h1>歐配 摩托車出租</h1>
		<h2>刪除租借單</h2>
	</div>

	<div class="cycle">
		<div class="content">
			<h3>請注意此動作進行後將無法返回</h3>
			<form method="GET" action="">
			<select name="form_no">
				<option value="">請選擇租借單編號</option>
			<?php
				$get_no="SELECT `number` FROM `form`";//取得所有的租借單編號
				$result=mysql_query($get_no);
				while($row=mysql_fetch_row($result))//列出所有編號作為選項
				{
					echo "<option value='".$row[0]."'>".$row[0]."</option>";
				}	
			?>
			</select><br><br>
			<input type="submit" value="確認刪除" onclick="success_hint()">
			</form>
		</div>
	</div>

<?php 
//收到要求後的動作
	$ask=$_GET["form_no"];
	
	//先找出此租借單中的車牌，並更新此車輛的狀態
	$find_license="SELECT `motor_license` FROM `record` WHERE `form_num`='".$ask."' ";
	$find_license_result=mysql_query($find_license);
	while($row=mysql_fetch_row($find_license_result))
	{
		$update_motor="UPDATE `motor` SET `state`=0 WHERE `license`='".$row[0]."' ";
		mysql_query($update_motor);
	}
	
	//刪除record中的紀錄
	$drop_record="DELETE FROM `record` WHERE `form_num`='".$ask."'";
	mysql_query($drop_record);

	//刪除form中的紀錄
	$drop_form="DELETE FROM `form` WHERE `number`='".$ask."' ";
	mysql_query($drop_form);
?>
	
<div class="url">
	<a href="EmployeeHome.php"><img src="img/home.png"></a><!--回到員工首頁-->
	<a href="modifyForm.php"><img src="img/checkmark.png"></a><!--修改訂單狀態-->
	<a href="DeleteForm.php"><img src="img/clipboard.png"></a><!--刪除訂單-->
	<a href="CustomerInfo.php"><img src="img/group.png"></a><!--查詢顧客資料-->
	<a href="AddMotor.php"><img src="img/add.png"></a><!--新增車輛-->
	<a href="DeleteMotor.php"><img src="img/delete.png"></a><!--刪除車輛-->
</div> 

<script>
function success_hint(){
	alert("刪除成功");
}
</script>

</body>
</html>