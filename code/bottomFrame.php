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
session_start();
$c=isset($_SESSION['callId'])?$_SESSION['callId']:"";
$error="";
$p=mysql_query("select * from problem");
$n=mysql_num_rows($p);
$problem=isset($_SESSION['problem'])?$_SESSION['problem']:"Enter problem above";
?>
<?php


if(isset($_POST['done']))
{
$solution=$_POST['solution'];

$op=$_SESSION['user'];


$PType=isset($_POST['PType']) ? $_POST['PType'] :'';
$empID=$_SESSION['user'];
$pid=$_SESSION['pid'];
if($_SESSION['login']==1&&$solution!="")
{
mysql_query("insert into solutiondesk (specialistId,callId,problem,solution) values ('$empID','$c','$problem','$solution')");
mysql_query("update callreq set status=-1 where callId='$c'");
mysql_query("insert into calllog (callId,operatorId,problemId) values('$c','$op','$pid')"); 
$r1=mysql_query("select *from callreq where callId=$c");
$ra1=mysql_fetch_array($r1);
$time1=$ra1[6];
$r1=mysql_query("select *from calllog where callId=$c");
$ra1=mysql_fetch_array($r1);
$time2=$ra1[4];

$t1=strtotime($time1);
$t2=strtotime($time2);
$d=$t2-$t1;
mysql_query("update calllog set duration=$d where callId='$c'");
//mysql_query("update calllog set operatorId='$op' where callId='$c'");

$c="";
}
else
{
$error="Please Login";
if($solution=="")
{
$error="Enter the solution";
}
}
}
?>
<form action="" method="post" name="form3" class="style4 style1" id="form3">
  <table width="742" border="0">
    
	<tr>
      <td colspan="3"><div align="center"><tt><h1 align="center">Interaction</h1></tt></div></td>
    </tr>
    <tr>
      <td width="321" height="33"><tt>Problem</tt></td>
      <td width="368"><tt>
        <?php echo $problem; ?>
      </tt></td>
    </tr>
    <tr>
	<td><tt>CallId </tt>
	</td>
	<td><tt>: <?php echo $c; ?></tt>
	</td>
	</tr>
	<tr>
      <td height="70"><tt>Solution</tt></td>
      <td><tt>
        <textarea name="solution"></textarea>
      </tt></td>
      <td>&nbsp;</td>
    </tr>
	<tr>
	<td><tt>Problem Type</tt>	</td>
	<td>
	<label> :
              <select name="PType">
                <?php
			  for($i=0;$i<$n;$i++) {$PType=mysql_fetch_array($p);?>
                <option value=<?php echo $PType[0]; ?>><?php echo $PType[1]; ?> </option>
                <?php } ?>
              </select>
              </label>	</td>
	</tr>
    <tr>
     
      <td><tt>
        <label></label>
      </tt></td>
	  <td><font color="#CC0000"><tt>
	    <input type="submit" name="done" value="                 Done                   " />
	  </tt><?php echo $error; ?>
	  </font>	  </td>
    </tr>
  </table>
</form>

<span class="style1"><tt>

</tt></span>
</body>
</html>
