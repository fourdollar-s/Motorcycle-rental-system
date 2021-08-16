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
		

	<?php
		include("connect.php");
		$select_db=@mysql_select_db("motorrentsystem");
		if(!$select_db)
			echo '<br>fail</br>';
		else{
			$get=$_POST["type"];
			session_start();
			$_SESSION['type']=$get;
			//$i=0;
			//while($i<count($get)){
			//	echo $get[$i];
			//	$i++;
			//}
			
	?>
				<form method="post" action="receipt_4.php">
				<TT>
					<center>
					<table border="1" width="30%" bgcolor=white style="font-size:20px;">

					
				<?
					$i=0;
					echo '<br>';
					while($i<count($get)){
						
						?>
						<tr>
						<td align="center" bgcolor=95CACA width=300><?echo $get[$i];?></td>
						<td align="left">
						<!--租借車種-->
							<?
							
							$sql_query="select * from motor where type='".$get[$i]."'";
							
							$result=mysql_query($sql_query);
							$row=mysql_num_rows($result);

							$num_can_rent=0;
							while($search=mysql_fetch_array($result)){//目前沒有被預訂的車數
								if($search[4] == 0)
									$num_can_rent++;
							}
							$cnt=1;
							$s="num".$i;
							
							?>
							
							<?
							if($num_can_rent == 0)
								echo "車輛已被預約完畢";
							else {
								?>
								<select name="<?echo $s;?>" style="font-size:20px;">
							<?
								while($cnt<=$row && $cnt<=$num_can_rent){
							?>
								
									<option value="<?echo $cnt?>"><?echo $cnt?>輛</option>
							<?
									$cnt++;
								}
							}
							
							?>
							</select>
						</td>
						</tr>
							<?
						$i++;
					}
				?>
					
					</table>

					<p align="center">
					<input value="下一步" type="submit">
					
				</form>

				<form method=get action="receipt_1.php">
					<input value="返回CC數選擇" type="submit">
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
