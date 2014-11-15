<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" scrollbar='yes' />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #004080}
-->
body {overflow-y: scroll;}

</style>

</head>

<body>
<table width="1341" border="0">
  <tr><h2>
    <td colspan="10" class="style1"><h1><div align="center"><tt>CALL CENTRE TRANSACTION'S </tt></div></h1></td>
  </tr>
  <tr>
    <td width="99"><span class="style1"><tt>
    <h2>CallID</h2></tt></span></td>
    <td width="151"><span class="style1"><tt>
    <h2>Customer Name</h2></tt></span></td>
    <td width="148"><span class="style1"><tt>
    <h2>Phone No. </h2></tt></span></td>
    <td width="177"><span class="style1"><tt>
    <h2>Problem Type</h2></tt></span></td>
    <td width="98"><span class="style1"><tt>
    <h2>Problem</h2></tt></span></td>
    <td width="163"><span class="style1"><tt>
    <h2>Solution</h2></tt></span></td>
    <td width="140"><span class="style1"><tt>
    <h2>OperatorId</h2></tt></span></td>
    <td width="191"><span class="style1"><tt>
    <h2>Operator Name</h2></tt></span></td>
    <td width="112"><span class="style1"><tt>
    <h2>Duration</h2></tt></span></td>
    <td width="20">&nbsp;</td>
  </tr>
  <?php
include "database.php";
$result=mysql_query("SELECT cr.callId, cr.custId, cr.phno,cl.problemId, problem, solution, cl.operatorId, duration
FROM callreq cr, calllog cl, solutiondesk sd  where cr.callId=cl.callId and cl.callId=sd.callId");
$no=mysql_num_rows($result);
while($row=mysql_fetch_array($result))
{
$callId=$row[0];
$custId=$row[1];
$phno=$row[2];
$problemId=$row[3];
$problem=$row[4];
$solution=$row[5];
$operatorId=$row[6];
$duration=$row[7];
$result1=mysql_query("select * from employee where empId='$operatorId'");
$row1=mysql_fetch_array($result1);
$operatorName=$row1[2];
$result2=mysql_query("select * from customer where custId='$custId'");
$row2=mysql_fetch_array($result2);
$custName=$row2[1];
?>
  <tr>
    <td><?php echo $callId; ?></td>
    <td><?php echo $custName; ?></td>
    <td><?php echo $phno; ?></td>
    <td><?php echo $problemId; ?></td>
    <td><?php echo $problem; ?></td>
    <td><?php echo $solution; ?></td>
    <td><?php echo $operatorId; ?></td>
 <td><?php echo $operatorName; ?></td>

    <td><?php echo $duration; ?></td>
  </tr>
  <?php
}
?>
</table>
</body>
</html>
