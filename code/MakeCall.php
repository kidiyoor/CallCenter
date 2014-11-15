<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['makecall']))
{
include "database.php";
session_start();
$phno=$_POST['phno'];
$result=mysql_query("select * from customer where phno='$phno'");
$row=mysql_fetch_array($result);
$custId=$row[0];
$op=$_SESSION['user'];
mysql_query("insert into callreq (phno,custId,status) values('$phno','$custId',1)");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="461" border="0">
    <tr>
      <td width="156">Mobile Number</td>
      <td width="295">: 
        <label>
        <input type="text" name="phno" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>&nbsp;
        <input type="submit" name="makecall" value="MakeCall" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
