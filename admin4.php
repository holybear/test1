<?php
session_start();
?>
<html>
<head>
<title>Add New Title and Decscription...</title>
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
<center>
<table border="0" width="100%" height="100%">
<tr>
  <th><img src="images/header-bg.jpg" width="1076" height="300"></th>
</tr>
<tr>
<th>
<a href="index.php"> Log Out !</a></th>
</tr>
<tr>
<th>
<?php
if(isset($_SESSION['admin']))
{
$conn = mysql_connect('localhost', 'root', '') or die ('Error connecting to mysql');
mysql_select_db('lia');
$msg="";
if(isset($_POST['submit2']))
{
$et=$_POST['etitle2'];
$ed=$_POST['edesc2'];
$ep=$_POST['epn2'];
$qry1=mysql_query("SELECT * FROM tc");
$cnt=mysql_num_rows($qry1);
$eid4=$cnt+1;
$qr="INSERT INTO `tc` (`title`,`desc`,`tid`,`pid`) VALUES('$et','$ed','$eid4','$ep')";

$st=mysql_query($qr,$conn);
echo $qr;
mysql_close($conn);
$link='index.php';
echo "<script>window.open('".$link."','_self')</script>";
//<!-- this is for testing -->

}
else
{

?>
<table border="0" align="top">

<form name="qs" method="post" action="admin4.php">
<!--  <input type="text" name="st" value=<?php echo $_SESSION['stime'];?> > -->
<tr>
<th>Please Add New Details ... :</th>
<tr>
<th>Title:</th><td>
<?php  echo"<input type=\"text\" name=\"etitle2\" value=\"\"></td></tr><tr><th>Description :</th><td>
<textarea name=\"edesc2\" cols=\"50\" rows=\"10\"></textarea></td></tr><tr><th>Page Number :</th><td><input type=\"text\" name=\"epn2\" value=\"\">";
}
?></td>
</tr>
</tr>
<tr>
<td colspan="4">
<center>
<input type="submit" name="submit2" value="Add Details !"></center></td>
</tr>
</form>
</table>
<?php


}
else
echo "<center><font color='#ff0055'><h1><br><br>Sorry !!!<br><br><u>Unauthorized Access...!!! </u></h1></font></center>";
?></th>
</tr>
</table>
</center>
</body>
</html>
