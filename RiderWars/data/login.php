<?php
session_start();
?>

<body bgcolor="black">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php
$connect = mysql_connect($host,$user,$pass) OR DIE("'Can't connect with $host"); 
mysql_select_db($main) or die(mysql_error()); 
if(empty($_POST))
{
  echo "<font size='4px' color='yellow'><center>Complete all fields</center></font>";
echo "<meta http-equiv='refresh' content='1;url=http://owngame.urnaweb.eu/RiderWars/'>";
  exit;
}
mysql_real_escape_string($_POST['account']);
mysql_real_escape_string($_POST['password']);


$login_sql = "SELECT * FROM account WHERE username='".$_POST['account']."' AND password='".$_POST['password']."'";
$login_q = mysql_query($login_sql);
$login = mysql_num_rows($login_q); 
if($login == 0)
{
  echo "<font size='4px' color='yellow'><center>Your Login or Password is Not valid</center></font>";
echo "<meta http-equiv='refresh' content='1;url=http://owngame.urnaweb.eu/RiderWars/'>";
  exit;
}
else
{
echo "<font size='4px' color='yellow'><center>Succesful login</center></font>";
echo "<meta http-equiv='refresh' content='1;url=http://owngame.urnaweb.eu/RiderWars/'>";
}

$_SESSION['playerID'] = $login_id;
$_SESSION['username'] = $login_name;
$_SESSION['login'] = 1;



?>


</body>
</html>