<?php 
session_start();
$dbhost = "XXX.XXX.XXX.XXX";
$charset = 'utf8';
$dbname = "XXX";
$dbuser = "XXX";
$dbpass = "XXX";
$tbname = 'XXX';
$name=addslashes($_POST["usernumber"]);  
$password=addslashes($_POST["password"]);  

try
{
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=$charset", $dbuser, $dbpass);
	$sql = "SELECT * FROM XXX where usernumber='$name'and password='$password'";
	
	if ( $query = $conn->query($sql) ) 
	{
		if($query->rowCount()<1)
		{
			echo"<script type='text/javascript'>alert('帳號或密碼錯誤'); location='index.php';</script>";  
		}
		else
		{	
			$_SESSION['usernumber'] = $name;
			echo"<script type='text/javascript'>alert('登入成功');location='data.php';</script>";
		}
	}
	else
	{
		echo "Query failed\n";
	}
	$conn = null;
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

?>