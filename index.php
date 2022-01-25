<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
?>
<html>
	<head>
		<meta  charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>學生簽到登入</title>
		<link href="C.css" rel="stylesheet" type="text/css" />
	</head>
 <body> 																				<!----------- 補id="page1" -------------->
		<div class="box" style="text-align:center;"> 
		<h2>學生簽到登入</h2>
		<form action="check.php" method="post" enctype="multipart/form-data">
			<div class="inputBox">
				<input type="text" name="usernumber" value="" required="required" placeholder=
					"           請輸入您的學號" pattern="[0-9]{9}" title="學號為9位數"><label>學號</label></div>
			<div class="inputBox">
				<input type="password" name="password" value=""	required="required" placeholder=
					"           請輸入您的密碼"><label>密碼</label></div>
					
			<input type="submit" name="submit" value="登入" >
			<input type="button" onclick="window.location.href='register.php'" name="submit" value="註冊" >			
					
		</form>
		<footer>
        <div class="container" style="text-align:center;color:#FFF;">
            <p class="copyright">© 版權沒有，要code找我</p>
            <p class="iware">Designed by :<br>張文彥、陳煒廂、伍倖儀</p>
        </div>
		</footer>	
		</div>
	</body>
</html>
