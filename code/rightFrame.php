<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="refresh" content="1">
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #004080}
-->
</style>
</head>

<body>
<table width="175" border="5">

<?php
 include "database.php";
 $result=mysql_query("select * from callreq where status>=0 and status<=1 ");
  while($row=mysql_fetch_array($result))
 {?>
 <tr>
 <td width="142" class="style1">
   <tt>
   <?php
 echo "CallID : ";
 echo $row[0];
 echo "<br>";
 echo "custID : ";
 echo $row[2];
 if($row[5]==0)
 {
 echo "<br>";
 echo "spec : ";
 $result2=mysql_query("select * from specialist where empId='$row[3]'");
$row2=mysql_fetch_array($result2);
 echo "$row2[1]";
 }
 
 ?> 
   </tt></td>
 </tr>
 <?php
 }
 ?>
</table>
</body>
</html>
