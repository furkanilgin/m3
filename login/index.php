<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TK Show Team - Yönetim Paneli</title><link rel="stylesheet" href="../libs/Panel/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="../libs/Panel/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="../libs/Panel/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );

});
</script>
</head>

<?php
require_once('../libs/Database.php');

$db = Database::connect();

if(isset($_POST["login"])){
	$stmt = $db->query("SELECT * FROM users WHERE username='".mysql_real_escape_string($_POST["user"])."' AND password='".mysql_real_escape_string($_POST["pass"])."'");
	$rows = $stmt->fetchAll();
	if(count($rows)){
		session_start();
		$_SESSION["valid_user"] = mysql_real_escape_string($_POST["user"]);
		if(isset($_POST["login-check"])){
			setcookie('user', mysql_real_escape_string($_POST["user"]));
			setcookie('pass', mysql_real_escape_string($_POST["pass"]));
		}
		echo "<script>location='../?page=home';</script>";
	}
	else{
		echo "<script>alert('Kullanıcı adı veya şifre hatalı');</script>";
	}
}

?>


<form method="post">
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<!-- <a href="index.php"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a> -->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Kullanıcı Adı</th>
			<td><input type="text" name="user" class="login-inp" value="<?php if(isset($_COOKIE["user"])) echo $_COOKIE["user"]; ?>" /></td>
		</tr>
		<tr>
			<th>Şifre</th>
			<td><input type="password" name="pass" value="<?php if(isset($_COOKIE["pass"])) echo $_COOKIE["pass"]; else echo "************"; ?>"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" name="login-check" />
			<label for="login-check">Beni Hatırla</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="login" class="submit-login" /></td>
		</tr>
		</table>
	</div>
 

</div>
<!-- End: login-holder -->
</body>
</html>