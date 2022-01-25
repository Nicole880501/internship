<?php 
	session_start();
	$usernumber = $_SESSION['usernumber'];
	include("connMysql.php");
	$seldb = @mysqli_select_db($db_link, "internship");
	$dbhost = "XXX.XXX.XXX.XXX";
	$charset = 'utf8';
	$dbname = "XXX";
	$dbuser = "XXX";
	$dbpass = "XXX";
	$tbname = 'Z';
	$report=$_POST['report'];
	$lastlog = "SELECT * FROM `Z` where usernumber=$usernumber ORDER BY id DESC LIMIT 0,1";
	$loginfo = mysqli_query($db_link, $lastlog);
	$row_result=mysqli_fetch_assoc($loginfo);
	$id = $row_result["id"];
	if($row_result["temp"]=='1')
	{
		try
		{
			$conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=$charset", $dbuser, $dbpass);
			$sql = "update XXX set signout = now(), report = ?, temp = 0 where (id = $id) and (usernumber = $usernumber)";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1,$report);
			$count = $stmt->execute();
			echo"<script type='text/javascript'>alert('簽退成功');location='data.php';</script>";
			$stmt = null;
			$conn = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
		}
	}
	else
	{
		echo "<script>alert('您還沒簽退!');location='data.php';</script>";
	}
?>