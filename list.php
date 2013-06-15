<?php
include("connect.php");
include("head.php");

	$SQL="SELECT * FROM `message` order by id desc";
	$query=mysql_query($SQL);
	while($row=mysql_fetch_array($query)){
?>

<table width=500 border="0" align="center" cellpadding="1" bgcolor="#add3ef">
	<tr bgcolor="#eff3ff">
	<td>标题：<?=$row['title']?>用户：<?=$row['user']?></td>
	</tr>
	<tr bgcolor="#ffffff">
	<td>内容：<?
	echo htmtocode($row['content']);
	?></td>
	</tr>
</table>
<?php
}
?>

//分页
<?php
$pagesize=5;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url['path'];


$numq=mysql_query("SELECT * FROM `message`");
$num = mysql_num_rows($numq);

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize)
{
	if($pageval<1)
		$pageval=1;
	echo "共 $num 条".
			" <a href=$url?page=".($pageval-1).">上一页</a> <a href=$url?page=".($pageval+1).">下一页</a>";
}

?>