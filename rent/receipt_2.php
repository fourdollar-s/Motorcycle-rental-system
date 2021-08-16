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
			$get=$_POST["cc"];
			session_start();
			$_SESSION['CC']=$get;
			//$i=0;
			//while($i<count($get)){
			//	echo $get[$i];
			//	$i++;
			//}
			
	?>
				<form method="post" action="receipt_3.php">
				<TT>
					<center>
					<table border="1" width="38%" bgcolor=white style="font-size:20px;">

					<tr>
					<td align="center" bgcolor=95CACA width=50>車型</td>
					<td align="left">
					<!--租借車種-->
				<?
					$i=0;
					$cnt=0;
					echo '<br>';
					while($i<count($get)){
						if($get[$i] == 1)
							echo '以下為電動機車，目前可以租借的車型<br>';
						else
							echo '以下為'.$get[$i]."CC，目前可以租借的車型<br>";
						

						$sql_query="select * from motor where CC='".$get[$i]."' order by `type` asc";
						$i++;
						$result=mysql_query($sql_query);
											
						
						while($row=mysql_fetch_array($result)){
							$flag=0;
							for($j=0;$j<$cnt;$j++){
								if($motor[$j]==$row[3]){
									$flag=1;
									break;
								}
							}
							
							$sql_query7="select * from motor where type='".$row[3]."'";
							
							$result7=mysql_query($sql_query7);
							$row7=mysql_num_rows($result7);

							$num_can_rent=0;
							while($search=mysql_fetch_array($result7)){//目前沒有被預訂的車數
								if($search[4] == 0)
									$num_can_rent++;
							}

							if($flag==0&& $num_can_rent>0){

					?>
								<input value="<?echo $row[3]?>" type="checkbox" name=type[]><?echo $row[3]?><br>
					<?
								$motor[$cnt]=$row[3];
								$cnt++;
								
							}
							
						}
						echo '<br>';
					}
				?>
					</td>
					</tr>
					</table>

					<p align="center">
					<input value="下一步" type="submit">
					
				</form>

				<form method=get action="receipt_1.php">
					<input value="返回重選" type="submit">
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
