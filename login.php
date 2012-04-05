<?php
session_start(); 
if(isset($_SESSION['admin']))
{
session_unset(); 
session_destroy();
}
?>

<head>
<title>LOGIN...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	font-size: 14px;
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
</style><body><center>
<?php 
if(isset($_POST['Submit']))
{
$conn = mysql_connect('localhost', 'root', '') or die ('Error connecting to mysql');
mysql_select_db('lia');

$msg="";
$name=$_REQUEST['nm'];
$pwd=$_REQUEST['pwd'];

if($name==="misaj" && $pwd==="naveen")
{
$_SESSION['admin']=$name;

$link='admin2.php';
echo "<script>window.open('".$link."','_self')</script>";
}
else
{
session_unset(); 
$msg="Invalid User ID ! Please Check Your User ID";
}

}

?>
<form name="form1" action="login.php" method="post">
<h1>&nbsp;</h1>
<table border="0" width="100%" height="100%">
<tr>
<td colspan="3"><img src="images/header-bg.jpg" width="1081" height="322"></td>
</tr>
<tr>
<td colspan="3">
  <?php if(isset($msg)){ echo $msg;  }?>
<center>
<table border="2" height="25%" width="35%">

<tr>
<td>

Name : </td><td><input type="text" name="nm" size="8" maxlength="8"></td></tr>
<tr><td>password : </td><td><input type="password" name="pwd" size="8" maxlength="8"></td></tr>
<tr><td></td><td>
          <input type="submit" name="Submit" value="Submit"></td></tr>
</td>
</table>
</center>
</tr>
<tr>
<td> test 1</td>
<td> test 2</td>
<td><a href="index.php" target="_self">Back To home</a></td>
</tr>
</table>

</form>
</center>
</body>
</html>
