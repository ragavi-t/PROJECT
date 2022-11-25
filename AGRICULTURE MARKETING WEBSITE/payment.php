<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$sess_user=$_SESSION['uname'];
$admin_qry=mysql_query("select * from admin where username='admin'");
$admin_row=mysql_fetch_array($admin_qry);
$admin_acc=$admin_row['acc_no'];

$pur_id=$_REQUEST['pur_id'];
$uname=$_REQUEST['user'];

$sq1=mysql_query("select * from user_purchase order by id desc");
$sr1=mysql_fetch_array($sq1);
$seller=$sr1['Seller'];
$sq2=mysql_query("select * from register where username='$seller' && utype='farmer'");
$sr2=mysql_fetch_array($sq2);
$mobile=$sr2['contact'];





if($sess_user==$_REQUEST['user'])
{

$uq=mysql_query("select * from register where username='$uname'");
$ur=mysql_fetch_array($uq);
$acc=$ur['acc_no'];


$pq=mysql_query("select * from user_purchase where uname='$uname' && pid=$pur_id && status=0");
	while($pr=mysql_fetch_array($pq))
	{	
	$total = $pr['price'] * $pr['uqut']; 
	$tot[]=$total;
	}
$amount=@array_sum($tot);	


}

if(isset($btnBuy))
{
$up=mysql_query("update user_purchase set status=1 where pid=$pur_id");

$ukey=$_POST['ukey'];

//if($_POST['accno']==$accno)
	
	if($accno==$acc)
	{
	//$aq=mysql_query("select * from myacct where acct='$accno'");
	//$ar=mysql_fetch_array($aq);
	//$bal_amt=$ar['depo'];
	
	//$aq2=mysql_query("select * from myacct where acct='$admin_acc'");
	//$ar2=mysql_fetch_array($aq2);
	//$bal_amt2=$ar2['depo'];
	
		//if($bal_amt>$amount)
		//{
		//$bal=$bal_amt-$amount;
		//$bal2=$bal_amt2+$amount;
		//$up=mysql_query("update myacct set depo=$bal where acct='$accno'");
		//$up2=mysql_query("update myacct set depo=$bal2 where acct='$admin_acc'");
		
		
		$mess="$uname,Rs.$amount";
		echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=msg&name=Consumer&mess='.$mess.'&mobile='.$mobile.'" frameborder="0" style="display:none"></iframe>';
					$msg="Sending Message...";
		?>
		<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
  window.location.href= 'message.php';
}, 5000);
</script>
		<?php
		//header("location:message.php");
		//}
		//else
		//{
		//$msg="Your balance is low, so you could not proceed!";
		//}
	
	}
	else
	{
	$msg="Account No. is wrong!";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validate()
{
	if(document.form1.bank.value=="")
	{
	alert("Enter the Bank Name...");
	document.form1.bank.focus();
	return false;
	}
	if(document.form1.accno.value=="")
	{
	alert("Enter the Account No.");
	document.form1.accno.focus();
	return false;
	}
	if(isNaN(document.form1.accno.value))
	{
	alert("Invalid Account No!");
	document.form1.accno.select();
	return false;
	}
	if(document.form1.creditno.value=="")
	{
	alert("Enter the Credi Card No.");
	document.form1.creditno.focus();
	return false;
	}
return true;	
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="26%" align="center" bgcolor="#E6EEFB" class="heading"><br />
      Online Payment </td>
      <td width="37%" align="right" valign="top" bgcolor="#E6EEFB"><img src="images/online_header.jpg" width="481" height="158" /></td>
      <td width="37%" align="center" valign="top" bgcolor="#E6EEFB"><img src="images/img2.jpg" width="240" height="158" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p>&nbsp;</p>
        <p class="txt1">Payment</p>
        <p class="txt1"><?php echo $msg; ?></p>
        <table width="460" height="377" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="149">Bank Name </td>
            <td width="176"><input type="text" name="bank" /></td>
          </tr>
          <tr>
            <td>Account No. </td>
            <td><input type="text" name="accno" /></td>
          </tr>
          <tr>
            <td>Credit Card No. </td>
            <td><input type="text" name="creditno" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><img src="images/credit.jpg" width="268" height="188" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnBuy" value="Buy Online" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p><a href="<?php echo 'user_purch_view.php?user='.$uname; ?>">Go to Shopping</a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
