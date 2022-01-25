<?php
header("Content-Type:text/html;charset=utf-8");
?>
<html>
	<head>
		<meta  charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>學生簽到註冊</title>
		<link href="C.css" rel="stylesheet" type="text/css" />
	</head>
 <body>																												<!----------- 補 id="page1"-------------->
		<div class="box" style="text-align:center;"> 
		<h2>學生簽到註冊</h2>
		<!--将用户输入的usernumber,和password提交到login.php-->
		<form action="checkregister.php" method="post" enctype="multipart/form-data">
			<div class="inputBox"><input type="text" name="usernumber" value="" required="required"
				placeholder=   "            請輸入您的學號" pattern="[0-9]{9}" title="學號為9位數"><label>學號</label></div>
			<div class="inputBox"><input type="password" name="password" value=""required="required"
				placeholder="            請輸入您的密碼"><label>密碼</label></div>
			<div class="inputBox"><input type="password" name="confirm" value=""required="required"
				placeholder="            請輸入您的密碼"><label>確認密碼</label></div>
			<div class="inputBox"><input type="text" name="name" value=""required="required"
				placeholder="            請輸入您的姓名"><label>姓名</label></div>
			<div class="inputBox"><input type="text" name="email" value=""required="required"
				placeholder="            請輸入您的email"><label>Email</label></div>
			<div class="inputBox"><input type="text" name="cellphone" value=""required="required"
				placeholder="            請輸入您的電話"><label>電話</label></div>
			<div class="inputBox"><input type="text" value="" name="codeNum" required="required"
				placeholder="            請輸入驗證碼" pattern="[0-9]{4}"  title="驗證碼為4個數字"><label>驗證碼</label></div>
			<input type="submit" name="submit" value="確認註冊">
			<input type="button" onclick="window.location.href='index.php'" value="返回登入">
			<img src="vericode.php" style="width:100px;height:25px;" id="code"/>
		</form>
		</div>
	</body>
</html>

