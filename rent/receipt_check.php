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
		<img src="流程3.png" width="800" height="110">

        <div id="description1">
		

	<?php
		include("connect.php");
		//echo '修改基本資料頁面<br>';
		$select_db=@mysql_select_db("motorrentsystem");//選資料表
		if(!$select_db)
			echo 'fail';
		else{
			
			$name=$_POST["name"];
			$id=$_POST["id"];
			$sex=$_POST["sex"];
			$birthday=$_POST["birthday"];
			$mail=$_POST["mail"];
			$tel=$_POST["tel"];
			$tax_id=$_POST["tax_id"];
			$tin=$_POST["tin"];
			$date_take=$_POST["date_take"];
			$hour=$_POST["hour"];
			$min=$_POST["min"];
			$date_return=$_POST["date_return"];
			$time_now=$_POST["time_now"];
			

			if($sex=='F')
				$gender='女';
			else
				$gender='男';

			if($min=="0")
				$min="00";
			$time=$hour.":".$min;
			
			session_start();
			$type=$_SESSION["type"];
			$cc=$_SESSION["CC"];
			//echo count($type);
			$num=$_SESSION["num"];
			
			date_default_timezone_set('Asia/Taipei');
			//$today=date('Y-m-d');
			
			if($name==NULL||$id==NULL||$sex==NULL||$birthday==NULL||$mail==NULL||$tel==NULL||$date_take==NULL||$hour==NULL||$min==NULL||$date_return==NULL){
				//echo '申請失敗<br>';
				echo '請確實填寫表格<br><br>';
				echo '<input type="button" onclick="history.back()" value="回到上一頁">';
			}
			else if(strtotime($time_now)>strtotime($date_take)||strtotime($date_return)<strtotime($date_take)){//租借的時間在今天之前//取車時間大於租車時間
				//echo '申請失敗<br>';
				echo '請檢查日期是否有誤<br><br>';
				echo '<input type="button" onclick="history.back()" value="回到上一頁">';
			}
			else{
				
				
		?>
				<form method="post" action="receipt_done.php">
				<h2>請確認以下資料是否正確<br></h2>

					<TT>
					<center>
					<table border="1" width="30%" bgcolor=white style="font-size:20px;">

					<tr>
					<td align="center" width=100 bgcolor=95CACA>姓名</td>
					<td align="left"><font size="5"><input type="hidden" name="name" value="<?echo $name; ?>"><?echo $name;?></td>
					</tr>

					<!--申請人姓名-->
					<tr>
					<td align="center" bgcolor=95CACA>身分證</td>
					<td align="left"><font size="5"><input type="hidden" name="id" value="<?echo $id; ?>"><?echo $id;?></td>
					</tr>

					<!--性別-->
					<tr>
					<td align="center" bgcolor=95CACA>性別</td>
					<td align="left"><font size="5"><input type="hidden" name="sex" value="<?echo $sex; ?>"><?echo $sex;?></td>
					</tr>

					<!--生日-->
					<tr>
					<td align="center" bgcolor=95CACA>生日</td>
					<td align="left"><font size="5"><input type="hidden" name="birthday" value="<?echo $birthday; ?>"><?echo $birthday;?></td>
					</tr>

					<!--連絡電話-->
					<tr>
					<td align="center" bgcolor=95CACA>聯絡電話</td>
					<td align="left"><font size="5"><input type="hidden" name="tel" value="<?echo $tel; ?>"><?echo $tel;?></td>
					</tr>

					<!--信箱-->
					<tr>
					<td align="center" bgcolor=95CACA>電子信箱</td>
					<td align="left"><font size="5"><input type="hidden" name="mail" value="<?echo $mail; ?>"><?echo $mail;?></td>
					</tr>

					<!--統一編號-->
					<tr>
					<td align="center" bgcolor=95CACA>統一編號</td>
					<td align="left"><font size="5"><input type="hidden"  name="tax_id" value="<?echo $tax_id;?>"><?echo $tax_id;?></td>
					</tr>


					<!--稅籍編號-->
					<tr>
					<td align="center" bgcolor=95CACA>稅籍編號</td>
					<td align="left"><font size="5"><input type="hidden"  name="tin" value="<?echo $tin;?>"><?echo $tin;?></td>
					</tr>

					<!--車子-->
					<tr>
					<td align="center" bgcolor=95CACA>租借車輛</td>
					<td align="left"><font size="5">
					<?
						$i=0;
						while($i<count($type)){
							echo $type[$i]."，".$num[$i].'輛<br>';
							$i++;
						}
					
					?>

					</td>
					</tr>

					<!--日期-->
					<tr>
					<td align="center" bgcolor=95CACA>取車日期</td>
					<td align="left"><font size="5"><input type="hidden"  name="date_take" value='"<?echo $date_take;?>"'><?echo $date_take;?>
					
					<!--取車時間-->
					<tr>
					<td align="center" bgcolor=95CACA>取車時間</td>
					<td align="left"><font size="5"><input type="hidden"  name="time" value="<?echo $time;?>"><?echo $time;?></td>
					</tr>

					<!--日期-->
					<tr>
					<td align="center" bgcolor=95CACA>還車日期</td>
					<td align="left"><font size="5"><input type="hidden"  name="date_return" value='"<?echo $date_return;?>"'><?echo $date_return;?>
					
		
				</table>
				<p align="center">
				<input value="確定" type="submit">
				
				</form>

				<form method=get action="receipt_4.php">
					<input value="返回個人資料表單" type="submit">
				</form>
		<?
			}
		}
		?>

        </div>
        	<!-- 網頁下方的工具列或訊息 -->
		<div id="info">
			<p>本店聯絡電話:0922222222</p>
			<p>本店地址:高雄市楠梓區xx路一段xxx號</p>
		</div>
</body>
</html>
