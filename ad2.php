<?php
session_start();
?>
<html>
<body>
<center>
<table border="0">
<tr>
<td>

<?php
if(isset($_SESSION['admin']))
{

$dbid = mysql_connect('localhost', 'root', '') or die ('Error connecting to mysql');
mysql_select_db('lia');
$msg="";
if(isset($_POST['submit']))
{
if(isset($_POST['ch']))
{
$uid=$_SESSION['admin'];
$re=$_POST['ch'];
echo "Testing.....".$re;
//$cnt=mysql_num_rows($qry1);
//if($cnt==0)
//$qry=mysql_query("INSERT INTO ans(uid,qno,ans) VALUES($uid,$qn1,$re)");
//else
//$qry=mysql_query("UPDATE tc SET  ans=$re  WHERE tid=$uid AND qno=$qn1");
//$ctime=time();
//if($ctime>($_SESSION['stime']+1800))
//{
//session_unset(); 
//session_destroy(); 
//}
}
//echo $_POST['ch'];
//else
//echo "no ans";
//mysql_close($conn);
//$link='index.php';
//echo "<script>window.open('".$link."','_self')</script>";
}
else
{
?>
<table border="0">
<tr>
<th colspan="4">

Welcome to The Site Editor !!!
</th>
</tr>
<tr>
<th colspan="4">
<pre><h3>
Edit What?
<p align="left">
title 1 
descccccccccccccccccccccccc

</p>
</pre></h3>

</th>
</tr>

<form name="qs" method="post" action="admin3.php">
<tr>
<th>Please Select The Section You Want To <u>EDIT</u> :</th>
<?php
$query="select * from tc";
$result=mysql_query($query,$dbid);
if($result==NULL)
echo "<h1> Error in Excecuting query... !</h1>".$query;
else
{
while($res=mysql_fetch_array($result))
{
echo $res['title'];
echo $res['desc'];

}
}
<tr>
<td colspan="4">
<center>
<input type="submit" name="submit" value="Edit"></center>
</td>
</tr>
</form>


</table>
<?php
}

}
else
echo "<center><font color='#ff0055'><h1><br><br>Sorry !!!<br><br><u>Unauthorized Access...!!! </u></h1></font></center>";
?>
</td>
<td><img src="lf2.jpg"></td>
</tr>
</table>
</center>
</body>
</html>
