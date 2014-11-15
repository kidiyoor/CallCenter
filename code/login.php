<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$_SESSION['login']=0;

if(isset($_POST['login']))
{
include "database.php";
$loginId=isset($_POST['loginId']) ? $_POST['loginId'] :'';
$password=isset($_POST['password']) ? $_POST['password'] :'';
$result=mysql_query("select * from employee where empId='$loginId' and password='$password'");
$no=mysql_num_rows($result);
if($no==1)
{
$row=mysql_fetch_array($result);
$_SESSION['user']=$row[0];
$_SESSION['login']=1;

//header('location:callCenter.php');
}

}
?>
<form id="form2" name="form2" method="post" action="">
<table width="294" height="132" border="0">
  <tr>
    <td width="73">LoginId</td>
    <td width="180"><label>
      <input type="text" name="loginId" />
    </label></td>
    <td width="27">&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label>
      <input type="password" name="password" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td><label>
    <input type="submit" name="login" value="LogIn" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
</body>
</html>
