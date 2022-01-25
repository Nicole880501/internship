<?php 
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$seldb = @mysqli_select_db($db_link, "XXX");
	if (!$seldb) die("資料庫選擇失敗！");
	$usernumber = $_SESSION['usernumber'];
	$sql_user = "SELECT * FROM `XXX` where usernumber=$usernumber";
	$sql_query = "SELECT * FROM `ZZZ` where usernumber=$usernumber";
	$userinfo = mysqli_query($db_link, $sql_user);
	$result = mysqli_query($db_link, $sql_query);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>107 醫管資 實習簽到網站</title>
	<link href="C.css" rel="stylesheet" type="text/css" />
</head>
	<body>
		<div class="box" style="text-align:center;"> 
			<h1>107 醫管資 <br>實習簽到網站</h1>
				<label style="color:#fff;font-size:14pt;"><?php
				if($_SESSION['usernumber'] != null)
				{
					$stru = "學號:"; 
					$strn = "\t\t\t\t姓名:";
					$strun = "\t\t\t\t實習老師:";
					while($row_result=mysqli_fetch_assoc($userinfo)){
						echo $stru."".$row_result["AAA"];
						echo "<br>";											
						echo $strn."".$row_result["SSS"];
						echo "<br>";											
						echo $strun."".$row_result["DDD"];
						echo "<br><br>";
					}
				}
				else
				{
					echo '您無權限觀看此頁面!';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
				}
				?></label>		
			<!-- 資料內容 -->
			<input type="button" onclick="window.location.href='signin.php'" name="submit" value="簽到" style="font-size:14pt;background:transparent;border:none;outline:none;color:#fff;background:#66B3FF;padding:3% 15%;cursor:pointer;border-radius:5px;margin:10px;">	
			<input type="button" onclick="window.location.href='report.php'" name="submit" value="簽退" style="font-size:14pt;background:transparent;border:none;outline:none;color:#fff;background:#66B3FF;padding:3% 15%;cursor:pointer;border-radius:5px;margin:10px;">	
			<br>
			<table border="1" align="center" style="color:#fff;">
			<!-- 表格表頭 -->
			<tr>
				<th>簽到記錄</th>
				<th>簽退紀錄</th>
			</tr>
			<!-- 資料內容 -->
			<?php
				if($_SESSION['usernumber'] != null)
				{
					while($row_result=mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td>".$row_result["ZZZ"]."</td>";
						echo "<td>".$row_result["XXX"]."</td>";
						echo "</tr>";
					}
				}
				else
				{
					echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
				}
			?>
			</table>
		</div>	
	</body>
</html>