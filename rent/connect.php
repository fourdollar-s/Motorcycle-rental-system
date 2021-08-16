<html>
<head>
<title>connect</title>
</head>

<!--連接到mysql-->
<?php
	$location="localhost";//連到本機
	$account="root";
	$password="sj152294";
	if(isset($location)&&isset($account)&&isset($password))//確認三個都有值
	{
		$link=mysql_pconnect($location,$account,$password);
		if(!$link)
		{
			echo '無法連接資料庫';
			exit();
		}
		//else{echo '成功連接到資料庫';}
	}
?>

<body>
</body>
</html>