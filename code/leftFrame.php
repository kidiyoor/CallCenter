<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #004080}
-->
</style>
</head>

<body>

<?php
include "database.php";
$specId=-1;
$problem="";
$custId="";
$name="";
$state="";
$pin="";
$phno="";
$city="";
$address="";
$specName="";
$flagc=0;
$flagu=0;
if(isset($_POST['GetCustomerDetails']))
{
if($flagu==0)
{
$custId=-1;
$custId=isset($_POST['custId']) ? $_POST['custId'] :'';
$result=mysql_query("select * from customer where custId=$custId");
if($result!=null)
{
$row=mysql_fetch_array($result);
$name=$row[1];
$address=$row[2];
$city=$row[3];
$state=$row[4];
$pin==$row[5];
$phno=$row[6];
}
}
$flagu=$flagu+1;
}
if(isset($_POST['logout']))
{
$_SESSION['login']=0;
$_SESSION['log']=1;
?>
<script>
parent.window.location='home.php'
</script>
<?php
//header('location:login.php');
}
?>
</tt></span>
<form action="" method="post" name="form1" class="style1" id="form1">
<table width="282" height="47" border="0">
  <tr>
    <td width="276" height="43"><tt>
      <label>Enter Customer Id </label>
    </tt></td>
  </tr>
  <tr>
    <td width="276"><tt>
      <label>
      <input type="text" name="custId" />
      </label>
    </tt></td>
  </tr>
  <tr>
    <td width="276"><tt>
      <label>
      <input type="submit" name="GetCustomerDetails" value="GetCustomerDetails" />
      </label>
    </tt></td>
  </tr>
</table>
<tt>
<table width="1187" border="0">

<tr>
<td width="374" height="218"><table width="283" border="0">
          <tr>
            <td width="105"><tt>Customer Id </tt></td>
            <td width="168"><tt>: <?php echo $name;?> &nbsp;</tt></td>
          </tr>
          <tr>
            <td><tt>Customer Name </tt></td>
            <td><tt>: <?php echo $name;?> &nbsp;</tt></td>
          </tr>
          <tr>
            <td><tt>Address</tt></td>
            <td><tt>: <?php echo $address;?> &nbsp;</tt></td>
          </tr>
          <tr>
            <td><tt>phno</tt></td>
            <td><tt>: <?php echo $phno;?> &nbsp;</tt></td>
          </tr>
          <tr>
            <td><tt>city</tt></td>
            <td><tt>: <?php echo $city;?> &nbsp;</tt></td>
          </tr>
          <tr>
            <td><tt>State</tt></td>
            <td><tt>: <?php echo $state;?> &nbsp;</tt></td>
          </tr>
          <tr>
            <td height="23"><tt>pin</tt></td>
            <td><tt>: <?php echo $pin;?> &nbsp;</tt></td>
          </tr>
      </table>
  <table width="282" border="0">
    <tr>
      <td width="276"><label>
        <div align="center">
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
		  <br />
          <br />
          <br />
          <br />
          <br />
          <input type="submit" name="logout" value="                           Logout                      " />
        </div>
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
