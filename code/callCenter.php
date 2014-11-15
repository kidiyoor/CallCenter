<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Call Centre</title>
</head>
<?php
session_start();
if(!($_SESSION['login']==1))
{
header('location:home.php');
}
?>
<frameset rows="*" cols="*,194" framespacing="2" frameborder="yes" border="2">
  <frameset rows="*" cols="292,*" framespacing="0" frameborder="yes" border="2">
    <frame src="leftFrame.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frameset rows="*,322" cols="*" framespacing="0" frameborder="yes" border="2">
      <frame src="main.php" name="mainFrame" bordercolor="#000066" id="mainFrame" title="mainFrame" />
      <frame src="bottomFrame.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
    </frameset>
    

  </frameset>

 	 <frame src="rightFrame.php" name="rightFrame" scrolling="No" noresize="noresize" id="rightFrame" title="rightFrame" />
</frameset>
<noframes><body>

</body>
</noframes></html>
