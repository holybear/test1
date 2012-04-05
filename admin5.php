<?php
session_start();
?>
<html>
<head>
<title>
Remove a Topic....
</title>
<?php
if(isset($_SESSION['admin']))
{


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
if(isset($_POST['rm']))
{

$eid4=$_POST['ch'];

$qr="DELETE FROM `tc` WHERE `tid` =$eid4";

$st=mysql_query($qr,$dbid);
echo $qr;
mysql_close($dbid);
$link='index.php';
echo "<script>window.open('".$link."','_self')</script>";

}




$query="select * from `tc` where `pid`=1";
$result=mysql_query($query,$dbid);
if($result==NULL)
echo "<h1> Error in Excecuting query... !";
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	font-size: 14px;
	color: #000000;
}
body {
	background-color: #FF9900;
	background-image: url(images/body-bg.jpg);
}
a {
	font-family: Times New Roman, Times, serif;
	font-size: 14px;
}
-->
</style></head>
<body>
<table border=0  width="100%" height="100%">
<tr>
  <td colspan="3"><img src="images/header-bg.jpg" width="1083" height="300"></td>
  </tr>
<tr>
<td><a href="admin4.php">Add new Title and Description !</a> </td><td><a href="admin5.php">Remove a Title and Description !</a> </td><td><a href="index.php">Log Out !</a> </td>
</tr>
<tr>
<td> left column</td>
<td>
<table border=0  width="100%" height="100%">

<form action="admin5.php" method="POST">
<tr><td>
<?php
while($res=mysql_fetch_array($result))
{
//echo "test 1";

echo "<tr><td><input type=\"radio\" width=\"2\" value=\"".$res['tid']."\" name=\"ch\">".$res['title']."</td></tr>";
//echo "<tr><td>".$res['desc']."</td></tr>";
}
?>
</td></tr>
<tr><td><input type="submit" value="Remove" name="rm"></td></tr>
</table>

</form></td>
<td> right column</td>
</tr>
<tr>
<td>test 1 </td><td>test 2 </td><td>test 3 </td>
</tr>
</table>

</body>
<?php
mysql_close($dbid);
}

else
echo "<center><font color='#ff0055'><h1><br><br>Sorry !!!<br><br><u>Unauthorized Access...!!! </u></h1></font></center>";
?>

</html>