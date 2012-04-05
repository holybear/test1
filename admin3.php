<?php
session_start();
?>
<html><style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	font-size: 14px;
	color: #000000;
	font-weight: bold;
}
body {
	background-color: #FF9900;
	background-image: url(images/body-bg.jpg);
}
a {
	font-family: Times New Roman, Times, serif;
}
-->
</style>
<body>
<center>
<table border="0">
<tr>
  <th><img src="images/header-bg.jpg" width="1008" height="300"></th>
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
if(isset($_POST['submit']))
{
$et=$_POST['etitle'];
$ed=$_POST['edesc'];
$eid4=$_SESSION['eid2'];

$qr="UPDATE `tc` SET `title` = '$et',`desc` = '$ed' WHERE `tid` =$eid4";

$st=mysql_query($qr,$conn);
echo $qr;
mysql_close($conn);
$link='index.php';
echo "<script>window.open('".$link."','_self')</script>";


}
else
{
$eid=$_POST['ch'];
$_SESSION['eid2']=$eid;
$result=mysql_query("SELECT * FROM tc WHERE tid=$eid",$conn);
$res=mysql_fetch_array($result);

?>
<table border="0" align="top">

<form name="qs" method="post" action="admin3.php">
<!--  <input type="text" name="st" value=<?php echo $_SESSION['stime'];?> > -->
<tr>
<th>Please Make the changes ... :</th>
<tr>

<?php  echo"<th>Title:</th><td><input type=\"text\" name=\"etitle\" value=\"".$res['title']."\"></td></tr><tr><th>
Description :</th><td><textarea name=\"edesc\" cols=\"50\" rows=\"10\">".$res['desc']."</textarea>";
}
?></td>
</tr>
</tr>
<tr>
<td colspan="4">
<center>
<input type="submit" name="submit" value="Edit"></center></td>
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
