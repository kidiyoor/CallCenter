<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	color: #004080;
}
.style4 {color: #004080}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<?php
session_start();
$_SESSION['problem']="Enter the problem above";
?>
<h1>
<p align="center" class="style4"><tt>Call Centre </tt></p>
</h1>
<span class="style4"><tt>
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
$p=mysql_query("select * from problem");
$n=mysql_num_rows($p);
?>
<?php
if(isset($_POST['transfer']))
{
$c=$_POST['callId'];
$PValue=$_POST['PType'];
$result1=mysql_query("select * from specialist where problemId='$PValue'");

$no=mysql_num_rows($result1);
$no=rand(1, $no);
for($e=0;$e<$no;$e++)
$r=mysql_fetch_array($result1);
$specName=$r[1];
$specId=$r[0];

$c=$_POST['callId'];
mysql_query("update callreq set operatorId='$specId' where callId='$c' ");
mysql_query("update callreq set status=0 where callId='$c' ");
}


?>
 <?php

if(isset($_POST['myself']))
{
$problem=$_POST['problem'];
$c=$_POST['callId'];


$_SESSION['problem']=$problem;
$_SESSION['callId']=$c;
$_SESSION['pid']=$_POST['PType'];
mysql_query("update callreq set status=2 where callId='$c'");
?>
<script>
parent.frames['bottomFrame'].location.reload();
</script>
<?php
}
?>

</tt></span>
<form action="" method="post" name="form1" class="style4" id="form1">
  <table width="811" border="0">
    <tr>
     
      <td width="473" height="207"><table width="418" height="230" border="0">
          <tr>
          <td width="107"><tt>CallID </tt></td>
          <td width="195"><tt>:    
              <input name="callId" type="text" />          
            </tt></td>
        </tr>
		  
		  
          <tr>
            <td><tt>Problem</tt></td>
            <td><tt>: 
                <label>
                <textarea name="problem"></textarea>
                </label>
            </tt></td>
          </tr>
		  <tr>
		  <td height="68" colspan="2"><div align="center"><tt>
		    <input type="submit" name="myself" value="                                      Handle Myself                                  " />
		  </tt></div></td>
		  </tr>
          
         
      </table></td>
	  <td width="328"><table width="312" border="0">
        <tr>
            <td width="217" height="55"><tt>Problem Type </tt></td>
            <td width="191"><tt>
              <label> :
              <select name="PType">
                <?php
			  for($i=0;$i<$n;$i++) {$PType=mysql_fetch_array($p);?>
                <option value=<?php echo $PType[0]; ?>><?php echo $PType[1]; ?> </option>
                <?php } ?>
              </select>
              </label>
            </tt></td>
          </tr>
		            <tr>
           
          </tr>
<tr>
            <td height="93"><tt>Problem Specialist</tt></td>
            <td><tt>: <?php echo $specName; ?> </tt></td>
          </tr>
        <tr>
          
          <td height="76" colspan="2"><div align="center"><tt>
            <input type="submit" name="transfer" value="                                               Transfer                                        " />
          </tt></div></td>
		  </tr>
      </table></td>
    </tr>
  </table>
  <p><span class="style4"><tt>
   
  </tt></span></p>
</form>

<?php
//session_destroy();
?>
</body>
</html>
