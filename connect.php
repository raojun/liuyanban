<?php
$connect=@mysql_connect("localhost","root","") or die("数据库启动失败");
mysql_select_db("liuyanban",$connect);
mysql_query("set charset 'utf8'");	//使用GBK中文编码

function htmtocode($connect){
	$connect=str_replace("\n","<br>",str_replace(" ","&nbsp",$connect));
	return $connect;
	 
}