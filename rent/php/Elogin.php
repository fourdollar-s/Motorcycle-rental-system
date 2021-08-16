<!--員工登入php-->
<!DOCTYPE html>

<html>
<head>
    <title>員工登入頁面</title>
</head>
<body>

<?php
	include("../connect.php");
	

	$select_db=@mysql_select_db("motorrentsystem");
	if(!$select_db) { echo '<br>找不到資料庫!<br>';}
	else{
		$acc=$_POST["account"]; //echo "<p>".$acc."</p>";
		$pswd=$_POST["password"]; //echo "<p>".$pswd."</p>";
		
		$find_user="SELECT * FROM employee WHERE number='".$acc."' AND password = '".$pswd."' ";
		$count=mysql_num_rows(mysql_query($find_user));
		//echo "<p>".$count."</p>";

		if($count>0){
			header("Location:../EmployeeHome.php");
			exit();
		}
		else{
			echo "<script>alert('帳號或密碼錯誤，將幫您導回首頁')</script>";
			echo "<script>window.location.href = '../Home.php'</script>";
		}
	}
?>

</script>
</body>
</html>