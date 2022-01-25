<?php
header("Content-Type:text/html;charset=utf-8");
	session_start();
	$usernumber = $_SESSION['usernumber'];
	include("connMysql.php");
	$sqldb = @mysqli_select_db($db_link, "AAA");
	$report=$_POST['report'];
	$lastlog = "SELECT * FROM `XXX` where usernumber=$usernumber ORDER BY id DESC LIMIT 0,1";
	$loginfo = mysqli_query($db_link, $lastlog);
	$row_result=mysqli_fetch_assoc($loginfo);
	if($_SESSION['usernumber'] != null)
	{
		if($row_result["temp"]!='1')
		{
			echo "<script>alert('您還沒簽到!');location='data.php';</script>";
		}
	}
	else
	{
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
	
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>實習心得</title>
		<link href="C.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="box" style="text-align:center;"> 
		<h2>今日的實習心得<br>(100字以內)</h2>
		<form action="signout.php" method="post" enctype="multipart/form-data">
			<div class="inputBox">
				<textarea rows="2" name="report" value="" required="required" placeholder="今日的實習心得" style="resize:none;width:80%;height:200px;"></textarea>
			</div>
			<input type="submit" name="submit" value="確認">
			<input type="button" onclick="window.location.href='data.php'" value="返回">
		</form>
		</div>
	</body>
</html>

