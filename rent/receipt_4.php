<html>

	<head>
		<title>線上租借</title>
		<link rel="stylesheet" href="Home.css">
	</head>
<body>
		<!-- 網頁最上方的標題 -->

		<div id="title1">
			<h1><a href = "Home.php">ALL PAY 歐配 摩托車出租</a></h1>
		</div>
		<div id="title2">
        		<div id="wrap">
            		<a href="searchMotor.php">車型查詢</a>
            		<a href="receipt_1.php">線上租借</a>
			</div>
		</div>	

		<center>
		<img src="流程2.png" width="800" height="110">
		
        <div id="description1">
		
			
	<?php
		include("connect.php");
		$select_db=@mysql_select_db("motorrentsystem");
		if(!$select_db)
			echo '<br>fail</br>';
		else{
			session_start();
			$type=$_SESSION["type"];
			$i=0;
			while($i<count($type)){
				$s="num".$i;
				$num[$i]=$_POST[$s];
				
				//echo $num[$i];
				$i++;
			}
			$_SESSION['num']=$num;
			
			
	?>
			
			<form method="post" action="receipt_check.php">

			<TT>
				<center>
				<table border="1" width="55%" bgcolor=white style="font-size:20px;">

				<!--申請人姓名-->
					<tr>
					<td align="center" width=200 bgcolor=95CACA>姓名</td>
					<td align="left"><input type=text size="40" name="name" style="font-size:20px;"></td>
					</tr>

					<tr>
					<td align="center" width=200 bgcolor=95CACA>身分證字號</td>
					<td align="left"><input type=text size="40" name="id" style="font-size:20px;"></td>
					</tr>

					<tr>
					<td align="center" width=100 bgcolor=95CACA>性別</td>
					<td align="left">
						<input value="M" type=radio name="sex" checked>男
						<input value="F" type=radio name="sex" >女
					</td>
					</tr>

					<tr>
					<td align="center" width=100 bgcolor=95CACA>生日</td>
					<td align="left"><input type=text size="40" name="birthday" style="font-size:20px;"></td>
					</tr>

					<!--連絡電話-->
					<tr>
					<td align="center" bgcolor=95CACA>聯絡電話</td>
					<td align="left"><input type=text size="40" name="tel" style="font-size:20px;"></td>
					</tr>

					<!--信箱-->
					<tr>
					<td align="center" bgcolor=95CACA>電子信箱</td>
					<td align="left"><input type=text size="40" name="mail" style="font-size:20px;"></td>
					</tr>

					<!--統一編號-->
					<tr>
					<td align="center" bgcolor=95CACA>統一編號<?echo '<br>';?>(選填)</td>
					<td align="left"><input type=text size="40" name="tax_id" style="font-size:20px;"></td>
					</tr>

					<!--稅籍編號-->
					<tr>
					<td align="center" bgcolor=95CACA>稅籍編號<?echo '<br>';?>(選填)</td>
					<td align="left"><input type=text size="40" name="tin" style="font-size:20px;"></td>
					</tr>

					<!--時段-->
					<tr>
					<td align="center" bgcolor=95CACA>取車日期</td>
					<td align="left">
					<input name="date_take" type="date" value="<?echo date('Y-m-d');?>" style="font-size:20px;">
					</td>
					</tr>

					<tr>
					<td align="center" bgcolor=95CACA style="font-size:20px;">取車時段</td>
					<td align="left">
					
							<select name="hour" style="font-size:20px;">
							<option value="">請選擇</option>
					<?
							for($i=11;$i<19;$i++){
					?>
								<option value=<?echo $i?>><?echo $i?>點</option>
					<?
					//for
							}
							
					?>
							</select>
							<select name="min" style="font-size:20px;">
								<option value="">請選擇</option>
								<option value="0">00分</option>
								<option value="30">30分</option>
							</select>
					
					</td>
					</tr>
					
					<tr>
					<td align="center" bgcolor=95CACA>還車日期</td>
					<td align="left"><input name="date_return" type="date" value="<?echo date('Y-m-d');?>" style="font-size:20px;">
					</td>
					</tr>

					<?
						# 設定時區
						date_default_timezone_set('Asia/Taipei');

						# 取得日期與時間（新時區）
						$datetime = date('Y/m/d');
						echo '<input type="hidden" name="time_now" value="'.$datetime.'">';
					?>
				
				</table>
			
				<p align="center">
				<input value="下一步" type="submit">
				<input value="清除" type="reset">
			</form>

			<form method=get action="receipt_1.php">
				<input value="返回CC數選擇" type="submit">
			</form>
		<?
			/*session_start();
			$_SESSION['name']=$_POST["name"];
			$_SESSION['id']=$_POST["id"];
			$_SESSION['sex']=$_POST["sex"];
			$_SESSION['birthday']=$_POST["birthday"];
			$_SESSION['tel']=$_POST["tel"];
			$_SESSION['mail']=$_POST["main"];
			$_SESSION['tax_id']=$_POST["tax_id"];
			$_SESSION['tin']=$_POST["tin"];
			$_SESSION['date']=$_POST["date"];
			$_SESSION['hour']=$_POST["hour"];
			$_SESSION['min']=$_POST["min"];
			$_SESSION['day']=$_POST["day"];

			*/
			}
		
		?>
		

        <div id="test">
		</div>
        </div>
		<!-- 網頁下方的工具列或訊息 -->
		<div id="info">
			<p>本店聯絡電話:0922222222</p>
			<p>本店地址:高雄市楠梓區xx路一段xxx號</p>
		</div>
</body>
</html>
