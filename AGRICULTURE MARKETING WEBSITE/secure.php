<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$msg="";

$username=918903834541;
$password=4905

$mobno=8903834541;
$vnumber=12345;
header('location:http://www.smszone.in/sendsms.asp?page=SendSmsBulk&username='.$username.'&password='.$password.'&number=" '.$mobno.' "&message=Your-Verification-Number=" '.$vnumber.'"&scheduledate=01/01/08');

		/*if($uname=="admin")
		{
			$qry = "select * from admin where username='$uname' && secret_code='".md5($sec_code)."'";
			$exe=mysql_query($qry);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				header("location:login.php?page=admin");
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
				//header("location:verify.php");
				header("location:login.php?page=user");
				}
				else
				{
				$msg="Invalid secret code!";
				}	
		}*/

?>
