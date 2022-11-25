<?php
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
if(isset($btn))
{
 if(trim($name)=="") { $msg = "Enter the Name..."; }
 else if(trim($contact)=="") { $msg = "Enter the Contact No."; }
 else if(trim($email)=="") { $msg = "Enter the E-mail..."; }
 else if(trim($uname)=="") { $msg = "Enter the Username"; }
 else if(trim($pwd)=="") { $msg = "Enter the Password"; }
 else if(trim($cpass)=="") { $msg = "Enter the Confirm Password"; }
 else if($pwd!=$cpass) { $msg = "Both Password are not equal!"; }
	else
	{
	$max_qry = mysql_query("select max(id) maxid from register");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("Y-m-d");
	
		$uqry="insert into register(id,utype,name,gender,address,pincode,contact,email,bank_name,acc_no,username,password,rdate) values($id,'farmer','$name','$gender','$address','$pincode',$contact,'$email','$bank_name','$acc_no','$uname','$pwd','$rdate')";
		$res=mysql_query($uqry);
		if($res)
		{
		?>
		<script language="javascript">
		window.location.href="reg_farmer.php?act=success";
		</script>
		<?php
		//header("location:register.php");
		}
		else
		{
		$msg="Could not be stored!";
		}
	}	
	
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {
	color: #990000
}
-->
</style>
<script language="javascript">
function validate()
{
	if(isNaN(document.form1.pincode.value))
	{
	alert("Invalid Pincode!");
	document.form1.pincode.select();
	return false;
	}
	if(isNaN(document.form1.contact.value))
	{
	alert("Invalid Mobile No!");
	document.form1.contact.select();
	return false;
	}
	if(document.form1.contact.value.length!=10)
	{
	alert("Mobile No must be 10 digits!");
	document.form1.contact.select();
	return false;
	}
	if(isNaN(document.form1.acc_no.value))
	{
	alert("Invalid Account No!");
	document.form1.acc_no.select();
	return false;
	}
return true;	
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
	  <?php
	  if($act=="success")
	  {
	  ?><p style="color:#006600">Register Success..</p><?php
	  }
	  ?>
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="405" height="360" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center"><strong>Farmer Registration </strong></td>
          </tr>
          <tr>
            <td width="162">Name</td>
            <td width="162"><input type="text" name="name" value="<?php echo $_POST['name']; ?>"></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input name="gender" type="radio" value="Male">
              Male
                <input name="gender" type="radio" value="Female">
            Female</td>
          </tr>
          <tr>
            <td>Address</td>
            <td><textarea name="address"><?php echo $_POST['address']; ?></textarea></td>
          </tr>
          <tr>
            <td>Pincode</td>
            <td><input type="text" name="pincode" value="<?php echo $_POST['pincode']; ?>"></td>
          </tr>
          <tr>
            <td>Mobile No. </td>
            <td><input name="contact" type="text" value="<?php echo $_POST['contact']; ?>" maxlength="10"></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>"></td>
          </tr>
          <tr>
            <td>Bank Name </td>
            <td><input type="text" name="bank_name" value="<?php echo $_POST['bank_name']; ?>"></td>
          </tr>
          <tr>
            <td>Account No. </td>
            <td><input type="text" name="acc_no" value="<?php echo $_POST['acc_no']; ?>"></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input type="text" name="uname" value="<?php echo $_POST['uname']; ?>" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="pwd" value="<?php echo $_POST['pwd']; ?>" /></td>
          </tr>
          <tr>
            <td>Confirm Password </td>
            <td><input type="password" name="cpass" value="<?php echo $_POST['cpass']; ?>"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" value="Register" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
