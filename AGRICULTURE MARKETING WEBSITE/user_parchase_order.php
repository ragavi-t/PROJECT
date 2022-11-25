<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$gqry=mysql_query("select * from product");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
</head>

<body><form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
	  
        <p><strong>Full Product Details </strong></p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="80%" border="0">
          <tr bgcolor="#999999">
            <th width="6%">Sno</th>
			 <th width="6%">Seller</th>
            <th width="11%">Product</th>
            <th width="11%">Location</th>
            <th width="11%">Soil Type</th>
            <th width="8%">Price</th>
            <th width="9%">Quantity</th>
            <th width="18%">Product Image </th>
            <th width="26%">Add to Cart </th>
          </tr>
		  <?php $i=0;
		  while($grow=mysql_fetch_array($gqry))
		  { $i++;
		  ?>
          <tr bgcolor="#99CCCC">
            <td><?php echo $i; ?></td>
			 <td><?php echo $grow['Seller']; ?></td>
            <td><?php echo $grow['product']; ?></td>
            <td><?php echo $grow['location']; ?></td>
            <td><?php echo $grow['stype']; ?></td>
            <td><?php echo $grow['price']; ?></td>
            <td><?php echo $grow['quantity']; ?></td>
            <td align="center"><img src="product/<?php echo $grow['product_image']; ?>" alt="img" width="42" height="42" /></td>
            <td align="center"><a href="user_purchase_part.php?gid=<?php echo $grow['id'];?>&sid=<?php echo $grow['Seller']; ?>">Add to Cart</a></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
        <blockquote>
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
