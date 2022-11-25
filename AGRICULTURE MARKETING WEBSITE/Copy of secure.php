<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$msg="";
if(isset($btnSubmit))
{
 if(trim($sec_code=="")) { $msg = "Enter the Secret code..."; }
	else
	{
		if($uname=="admin")
		{
			$qry = "select * from admin where username='$uname' && secret_code='".md5($sec_code)."'";
			$exe=mysql_query($qry);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				header("location:admin.php");
				}
				else
				{
				$msg="Invalid secret code!";
				}	
		}
		else
		{
			$qry = "select * from register where username='$uname' && secret_code='".md5($sec_code)."'";
			$exe=mysql_query($qry);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				header("location:verify.php");
				}
				else
				{
				$msg="Invalid secret code!";
				}	
		}
	}	
	
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td align="center" class="subhead"><a href="logout.php">Logout</a></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1"><strong>Access Control </strong></p>
        <p class="style1"><?php echo $msg; ?></p>
      <table width="349" height="169" border="0" cellpadding="10" cellspacing="0" class="border2">
        <tr>
          <td colspan="2" align="center" class="txt1">&nbsp;</td>
        </tr>
        <tr>
          <td width="94" class="txt1">Secret Code </td>
          <td width="90" class="txt1"><input type="password" name="sec_code" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="txt1"><input type="submit" name="btnSubmit" value="Submit" />
            &nbsp;
            <input type="reset" name="Reset" value="Clear"></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p></p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
