<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
if(isset($btnSubmit))
{
	if(trim($category)=="")
	{
	$msg="Enter the Category";
	}
	else
	{
$max_qry = mysql_query("select max(id) maxid from category");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("Y-m-d");
	$pass=md5($pwd);
		$uqry="insert into category(id,category) values($id,'$category')";
		$res=mysql_query($uqry);
		if($res)
		{
		$msg="Added Successfully...";
		}
		else
		{
		$msg="Could not be stored!";
		}
	}

}
if(isset($btn))
{
$fname=$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"spreadsheet-reader-master/upload/".$fname);
?>
<script language="javascript">
window.location.href="view_data.php?fname=<?php echo $fname; ?>";
</script>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
</head>

<body><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="200" border="1">
          <tr>
            <td>Select dataset File </td>
            <td><label>
              <input type="file" name="file" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="btn" value="Upload" />
            </label></td>
          </tr>
        </table>
        <p class="style1">&nbsp;</p>
        <p class="style1">&nbsp;</p>
        <table width="292" height="124" border="1">
          <tr>
            <th colspan="2">Add Category </th>
          </tr>
          <tr>
            <td width="132">Category Name </td>
            <td width="144"><input type="text" name="category" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnSubmit" value="Submit" /></td>
          </tr>
        </table>
        <blockquote>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      </blockquote></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
