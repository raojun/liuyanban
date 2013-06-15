<?php
include("connect.php");
	if(@$_GET[out]){
		setcookie("cookie","out");
		echo "<script language=\"javascript\">location.href='login.php';</script>";
	}
	
	if(@$_POST[id]=='admin'){
		$pw=md5($_POST[pw]);
		if($pw=='198a477b609eb83f3913041c56530e49﻿'){
			setcookie("cookie","ok");
			echo "<script language=\"javascript\">location.href='login.php';</script>";
		}
	}
	
include("head.php");
if(@$_COOKIE['cookie']!='ok'){
?>

<script language=javascript>
function Checklogin()
{
	if(myform.id.value=="")
	{
		alert("请填写登录名！");
		myform.id.focus();
		return false;
	}
	if(myform.pw.value=="")
	{
		alert("请填写密码！");
		myform.pw.focus();
		return false;
	}
}
</script>

<form action="" method="post" name="myform" onsubmit="return Checklogin();">
	ID:<input type="text" name="id" /><br />
	PW:<input type="password" name="pw" /><input type="submit" name="submit" value="登录" />
</form>
<?
}else{
?>
	<a href='?out=login'>退出</a>
<?
}
?>