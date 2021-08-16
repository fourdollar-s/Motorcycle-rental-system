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
		<img src="流程4.png" width="800" height="110">

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
            $time=$_POST["time"];
            $date_return=$_POST["date_return"];
            
            $date=$date_take."~".$date_return;
        
            session_start();
            $type=$_SESSION["type"];
            $cc=$_SESSION["CC"];
            //echo count($type);
            $num=$_SESSION["num"];

            //echo $mail;

            $cnt=0;
            $money=0;
            while($cnt<count($type)){
                //echo $cnt;
                //echo $type[$cnt];
                //echo $num[$cnt];
                $sql_price="select price from motor where type='".$type[$cnt]."'";
                $price=mysql_query($sql_price);
                $row=mysql_fetch_array($price);
                $money=$money+$row[0]*$num[$cnt];
                $cnt++;       
            }
            //echo $money;

            $sql="select * from form";//現在幾筆
            $all=mysql_query($sql);
            $order_id=mysql_num_rows($all);
            $order_id+=1;

            $sql_query1="insert into renter values('".$id."','".$name."','".$sex."','".$birthday."','".$tel."','".$mail."',NULL)";
            $result1=mysql_query($sql_query1);
            
            $sql_query2="insert into form(number,renter_id,rent_date,pick_time,return_time,take,`return`,cost) values('".$order_id."','".$id."','".$date."','".$time."','".$time."','0','0','".$money."')";
            $result2=mysql_query($sql_query2);
            
            
            $i=0;
            //echo count($type);
            while($i<count($type)){
                $sql_query3="select * from motor where type='".$type[$i]."'";
                $result3=mysql_query($sql_query3);
                $cnt=0;
                while($cnt<$num[$i]){
                    $search=mysql_fetch_array($result3);
                    //echo $search[4];
                    if($search[4] == 0){
                        $license=$search[0];
                        //echo $license;  

                        $sql_query5="insert record values('".$license."','".$order_id."')";
                        $result5=mysql_query($sql_query5);

                        $sql_query4="update motor set state = 1 where license='".$license."'";
                        $result4=mysql_query($sql_query4);

                        $cnt++;
                    }
                }

                $i++;
            }


            ?>

            <p align="center">租借成功</p>
            
            <?
            $sql_query="select * from form where number='".$order_id."'";
            $result1=mysql_query($sql_query);

            $sql_query1="select * from renter where ID='".$id."'";
            $result2=mysql_query($sql_query1);
            //$sql_query="select * from receipt_list where Receipt_no='".$order_id."'";
            //$result2=mysql_query($sql_query);
        
        echo '<center>';
            echo '<table border=1 align="center" bgcolor=white>';
            echo '<tr width=20% bgcolor=95CACA align="center">';
            echo '<td><h2>表單編號</h2>';
            echo '<td><h2>姓名</h2>';
            echo '<td><h2>身分證</h2>';
            echo '<td><h2>租借日期</h2>';
            echo '<td><h2>取車時間</h2>';
            echo '<td><h2>金額</h2>';
            $row=mysql_fetch_array($result1);
            $row1=mysql_fetch_array($result2);
            //$row1=mysql_fetch_array($result2);
            echo '<tr align="center">';
            echo '<td><font size="4">'.$row[0];//order_id
            echo '<td><font size="4">'.$row1[1];//name
            echo '<td><font size="4">'.$row[1];//id
            echo '<td><font size="4">'.$row[2];//date
            echo '<td><font size="4">'.$row[3];//pick_time
            echo '<td><font size="4">'.$row[7];//money
            
            
            echo '</table>';
    ?>
            <form method=get action='Home.php'>
                <p align="center">
                <input value="首頁" type="submit">
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
