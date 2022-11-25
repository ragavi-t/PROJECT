<?php
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$msg="";

if(isset($btn))
{
$gqry=mysql_query("select * from product where location like '%$ltn' ||  product like '%$ltn' || description like '%$ltn'" );
$num=mysql_num_rows($gqry);
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
      <td align="left" class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1"><strong>Welcome <?php echo $uname; ?></strong></p>
        <p class="style1"><?php echo $msg; ?></p>
        <p>
          Search the Location/ Agri Product
            <input type="text" name="ltn" value="<?php echo $_REQUEST['ltn']; ?>">
          &nbsp;&nbsp;
          <input type="submit" name="btn" value="Search">
        </p>
      <p>&nbsp;</p>
	  <?php
	  if($num!=0)
	  {
	  ?>
      <table width="75%" border="0">
        <tr bgcolor="#999999">
          <th width="6%">Sno</th>
          <th width="11%">Seller</th>
          <th width="11%">Product</th>
          <th width="11%">Location</th>
          <th width="11%">Soiltype</th>
          <th width="8%">Price</th>
          <th width="10%">Quantity</th>
          <th width="17%">Product Image </th>
          <th width="26%">update image </th>
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
          <td align="center"><a href="user_purchase_part.php?gid=<?php echo $grow['id']; ?>&sid=<?php echo $grow['Seller']; ?>">Add to Cart</a></td>
        </tr>
        <?php
		  }
		  ?>
      </table>
	  <?php
	  }//num
	  ?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><a href="user_parchase_order.php">View All Products</a></p>
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
