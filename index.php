<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
session_start();
session_unset(); 
session_destroy();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LIA HOLYDAYS ! Tours And Travels ...</title>
<?php
$dbid=mysql_connect("127.0.0.1","root","");
if($dbid==NULL)
echo "<h1>Error Connecting Data Base...!!!</h1>";
else
{
$dbs=mysql_select_db("lia");
if($dbs==NULL)
echo "<h1>Error Selecting Data Base...!!!</h1>";
else
{
//echo "<h1> Data base Connection Success... !!!</h1>";
$query="select * from tc where pid=1";
$result=mysql_query($query,$dbid);
if($result==NULL)
echo "<h1> Error in Excecuting query... !";
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	color: #000000;
}
body {
	background-color: #CC9900;
	background-image: url(images/body-bg.jpg);
	margin-left: 15px;
	margin-top: 15px;
	margin-right: 15px;
	margin-bottom: 15px;
}
a {
	font-family: Times New Roman, Times, serif;
	font-size: 14px;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Times New Roman, Times, serif;
}
-->
</style></head>
<body>
<center>
<table  width="100%" height="100%" border="0" align="center">
<tr>
  <td colspan="3" c="c"><img src="images/header-bg.jpg" width="1067" height="323" /></td>
  </tr>
<tr>
<td c="c"><a href="index2.php">Page 2</a> </td>
<td><a href="index3.php">Page 3</a> </td><td><a href="login.php"> Administration</a> </td>
</tr>
<tr>
<td> left column</td>
<td>
<table border="0"  width="100%" height="100%">
<?php
while($res=mysql_fetch_array($result))
{
//echo "test 1";
echo "<tr><th>".$res['title']."</th></tr>";
echo "<tr><th>".$res['desc']."</th></tr>";
}
?>
</table></td>
<td> right column</td>
</tr>
<tr>
<td>test 1 </td><td>test 2 </td><td>test 3 </td>
</tr>
</table>
</center>
</body>
<?php
mysql_close($dbid);
?>
</html>