<html>

	<head>
		<title>場地租借</title>
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
        <div id="description1">
		<?php
			include("connect.php");
			$select_db=@mysql_select_db("motorrentsystem");
			if(!$select_db)
				echo '<br>fail</br>';
			else{

		?>
				
				<center>
				<table border="1" width="25%" bgcolor=white style="font-size:18px;">

				<!--租借車種-->
				<tr>
				<td align="center" bgcolor=95CACA width=100>CC數</td>
				</tr>
						
						
				<tr>
				<td align="center">	
				<select name="cc" onchange="window.location='<? echo $PHP_SELF; ?>?cc='+this.value" style="font-size:18px;">
					<option value="">請選擇</option>
					<option value=1 <?if($_GET["cc"]=="1"){echo "selected";}?>>電動機車</option>
					<option value=110 <?if($_GET["cc"]=="110"){echo "selected";}?>>110CC</option>
					<option value=115 <?if($_GET["cc"]=="115"){echo "selected";}?>>115CC</option>
					<option value=125 <?if($_GET["cc"]=="125"){echo "selected";}?>>125CC</option>
					<option value=150 <?if($_GET["cc"]=="150"){echo "selected";}?>>150CC</option>
					<option value=155 <?if($_GET["cc"]=="155"){echo "selected";}?>>155CC</option>
					<option value=158 <?if($_GET["cc"]=="158"){echo "selected";}?>>158CC</option>
					<option value=180 <?if($_GET["cc"]=="180"){echo "selected";}?>>180CC</option>
				</select>
				</td>
				</tr>
				</table>
				
			<?	
				$type=$_GET['type'];
				$cc=$_GET['cc'];
				
				/*if($type!="NULL"&&$cc!="NULL"){
					//echo 'hello';
					$sql_query="select * from motor where type='".$type."' and CC='".$cc."'";
					$result=mysql_query($sql_query);

					$row=mysql_num_rows($result);
					if($row==0)
						echo '<h2>該CC數沒有這個車型!</h2>';
					else{
						echo '<img src=motor/'.$type.'.jpg width=100 hight=100>';
					}
				}*/


				if($cc!=NULL){
					/*$sql_query="select * from motor where CC='".$cc."'";
					$result=mysql_query($sql_query);
					$cnt=0;
					while($row=mysql_fetch_array($result)){
					?>

						<table border="1" width="15%" bgcolor=white style="font-size:18px;">
							<tr>
							<td align="center" bgcolor=95CACA width=80>車型</td>
							</tr>
							<tr>
							<td align="center">
							<select name="type" onchange="window.location='<? echo $PHP_SELF; ?>?type='+this.value" style="font-size:18px;">
								<option value='<?echo $motor[$i]?>'><?echo $row[3]?></option>
								</select>
							</td>
							</tr>
						</table>

					<?
					}*/
					echo '<br>';
					$sql_query="select * from motor where CC='".$cc."'";
					$result=mysql_query($sql_query);
					$cnt=0;
					while($row=mysql_fetch_array($result)){
						$flag=0;
						for($j=0;$j<$cnt;$j++){
							if($motor[$j]==$row[3]){
								$flag=1;
								break;
							}
						}
						if($flag==0){
							$temp=explode(" ",$row[3]);
							$new_row=implode("-",$temp);
							//echo $new_row;
							?>
							
							<table border="1" width="30%" bgcolor=white style="font-size:18px;display:inline;">
							<tr>
							<td align="center" bgcolor=95CACA width=120><?echo $row[3];?></td>
							</tr>
							<tr>
							<td align="center">
									
								<img src=motor/<?echo $new_row;?>.jpg width=300 hight=300><br>
							</td>
							<tr>
							<td align="center">價格:<?echo $row[1];?>元/24hr</td>
							</tr>
							
							</table>	
							<?
							$motor[$cnt]=$row[3];
							$cnt++;
						}
					}
					
					
				}
				if($cc==NULL){
					
					?>
					<table border="1" width="25%" bgcolor=white style="font-size:18px;">
					<tr>
					<td align="center" bgcolor=95CACA width=80>車型</td>
					</tr>
					<tr>
					<td align="center">	
					<?
						
						$selectAll="SELECT * FROM `motor` order by type asc";
						$all=mysql_query($selectAll);
						$num=mysql_num_rows($all);
						//echo $num;
						$cnt=0;
						while($row=mysql_fetch_array($all)){
							//echo $row[3];
							$flag=0;
							for($j=0;$j<$cnt;$j++){
								if($motor[$j]==$row[3]){
									$flag=1;
									break;
								}
							}
							if($flag==0){
								//echo $row[3];
								$sql_query7="select * from motor where type='".$row[3]."'";
								$result7=mysql_query($sql_query7);
								$row7=mysql_num_rows($result7);
								$motor[$cnt]=$row[3];
								$cnt++;
								
							}
							
						}

					?>
					<select name="type" onchange="window.location='<? echo $PHP_SELF; ?>?type='+this.value" style="font-size:18px;">
					<option value="">請選擇</option>
					<?
						$i=0;
						while($i<count($motor)){
							$temp=explode(" ",$motor[$i]);
							$new=implode("-",$temp);
					?>
							<option value="<?echo $new;?>" <?if($_GET["type"]==$new){echo "selected";}?>><?echo $new;?></option>
					<?	
							$i++;
						}

					?>
						
						
					</select>
					</td>
					</tr>
					</table>
					<?
					if($type!=NULL){
						$temp=explode("-",$type);
						$type_DB=implode(" ",$temp);
						//echo $type_DB;

						echo '<br>';
						$sql_query1="select * from motor where `type`='".$type_DB."'";
						$result1=mysql_query($sql_query1);
						$row1=mysql_fetch_array($result1);
						?>
						<table border="1" width="30%" bgcolor=white style="font-size:18px;display:inline;">
						<tr>
						<td align="center" bgcolor=95CACA width=120><?echo $type;?></td>
						</tr>
						<tr>
						<td align="center">
							<img src=motor/<?echo $type;?>.jpg width=300 hight=300>
						</td>
						</tr>
						<tr>
							<td align="center">價格:<?echo $row1[1];?>元/24hr</td>
						</tr>
						<tr>
							<td align="center"><?echo $row1[2];?>CC</td>
						</tr>
						</table>	
						<?
						
					}
				}
				
			}
			echo '<br><br>';
			?>
			
			<input type="button" onclick="window.location='<? echo $PHP_SELF; ?>?type=&cc='" value="重新查詢">
			<input type="button" onclick="window.location='Home.php'" value="回首頁">
			
				
		</div>
		<div id="test">
		</div>
		<!-- 網頁下方的工具列或訊息 -->
		<div id="info">
			<p>本店聯絡電話:0922222222</p>
			<p>本店地址:高雄市楠梓區xx路一段xxx號</p>
		</div>
</body>
</html>
