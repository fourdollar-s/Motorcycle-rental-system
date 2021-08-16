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
		<img src="流程1.png" width="800" height="110">
        <div id="description1">
		
		<TT>
	<?php
		include("connect.php");
		$select_db=@mysql_select_db("motorrentsystem");
		if(!$select_db)
			echo '<br>fail</br>';
		else{
			
			
	?>
				<form method="post" action="receipt_2.php">
				
					<center>
					<table border="1" width="30%" bgcolor=white style="font-size:20px;">

					<!--租借車種-->
					<tr>
					<td align="center" bgcolor=95CACA width=50>車種</td>
					<td align="left">
						<input value="1" name=cc[] type="checkbox">電動機車<br>
						<input value="110" name=cc[] type="checkbox">110CC<br>
						<input value="115" name=cc[] type="checkbox">115CC<br>
						<input value="125" name=cc[] type="checkbox">125CC<br>
						<input value="150" name=cc[] type="checkbox">150CC<br>
						<input value="155" name=cc[] type="checkbox">155CC<br>
						<input value="158" name=cc[] type="checkbox">158CC<br>
						<input value="180" name=cc[] type="checkbox">180CC<br>

					</td>
					</tr>
					</table>

					<p align="center">
					<input value="下一步" type="submit">
					<input value="清除" type="reset">
				</form>
		<?
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
