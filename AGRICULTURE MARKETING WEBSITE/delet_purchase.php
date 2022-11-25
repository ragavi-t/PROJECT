<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
$del = $_REQUEST['did'];
extract($_POST);
$pur_id=$_SESSION['purchase_id'];
$q1=mysql_query("select * from user_purchase where id=$del");
$r1=mysql_fetch_array($q1);
$qty=$r1['uqut'];
$prod_id=$r1['nid'];
mysql_query("update product set quantity=quantity+$qty where id=$prod_id");

$delet = mysql_query("DELETE FROM user_purchase WHERE id='$del'")or die("".mysql_error());
if($delet != 0)
{
@header('Location:user_purch_view.php');
}
?>