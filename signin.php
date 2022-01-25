<?php 
session_start();
if($_SESSION['usernumber'] == null)
{
	echo"<script type='text/javascript'>alert('請先登入!'); location='index.php';</script>";  
}
else
{
	$usernumber = $_SESSION['usernumber'];
	include("connMysql.php");
	$seldb = @mysqli_select_db($db_link, "AAA");
	$dbhost = "XXX.XXX.XXX.XXX";
	$charset = 'utf8';
	$dbname = "XXX";
	$dbuser = "XXX";
	$dbpass = "XXX";
	$tbname = 'XXX'; 
	$lastlog = "SELECT * FROM `XXX` where usernumber=$usernumber ORDER BY id DESC LIMIT 0,1";
	$loginfo = mysqli_query($db_link, $lastlog);
	$row_result=mysqli_fetch_assoc($loginfo);
	if($row_result["temp"]=='1')
	{
		echo "<script>alert('已簽到過，請先簽退!');location='data.php';</script>";
	}
	else
	{
		try
		{
			$conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=$charset", $dbuser, $dbpass);
			$sql = "INSERT INTO XXX(usernumber,signin,temp) VALUES(?,now(),1)";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1,$usernumber);
			$count = $stmt->execute();
			echo"<script type='text/javascript'>alert('簽到成功');location='data.php';</script>";
			$stmt = null;
			$conn = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
		}
	}
}	
?>
