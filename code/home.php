<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
}
-->
</style>
</head>

<body style="background-color:A60000;">
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
header('location:callCenter.php');
}

}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="1356" height="620" border="1" bordercolor="#339966" style="border:3px solid #E6E6FA;">
    <tr style="background-color:#E6E6FA;" style="border:3px solid olive;">
      <td width="1008" height="66"><div align="center" class="style1"><tt><font size=6 color="#660033"> CallCenter </font></tt></div></td>
      <td width="338" rowspan="2"  style="background-color:#E6E6FA;"><div align="left">
        <table width="337" border="0"   background="#callogin.jpg">
          <tr>
            <td width="104" height="46">LoginId</td>
            <td width="223"><label>
              <input type="text" name="loginId" />
            </label></td>
          </tr>
          <tr>
            <td height="44">Password</td>
            <td><label>
              <input type="password" name="password" />
            </label></td>
          </tr>
          <tr>
            <td height="44" colspan="2"><label> </label>
                <div align="center">
                  <input type="submit" name="login" value="login" />
              </div></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="548"><img src="callcenter2.jpg" width="998" height="403" align="top" /></td>
    </tr>
  </table>
</form>
</body>
</html>
