<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
if(isset($login))
{
 if(trim($uname=="")) { $msg = "Enter the Username"; }
 else if(trim($pwd=="")) { $msg = "Enter the Password"; }
	else
	{
		if($uname=="admin")
		{
			$qry = "select * from admin where username='$uname' && password='".md5($pwd)."'";
			$exe=mysql_query($qry);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
				mysql_query("delete from temp_files where user='admin'");
				header("location:admin.php");
				}
				else
				{
				$msg="Login Incorrect!";
				}
		}
		else
		{
			$qry = "select * from register where username='$uname' && password='".md5($pwd)."'";
			$exe=mysql_query($qry);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
				mysql_query("delete from temp_files where user='$uname'");
				header("location:user_page.php");
				}
				else
				{
				$msg="Login Incorrect!";
				}	
		}
	}	
	
}
?>
<?php
$img_q=mysql_query("select * from product");
while($img_r=mysql_fetch_array($img_q))
{
$img[] = $img_r['product_image'];
}
$img2 = array_chunk($img,5);
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="3" align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td colspan="3"><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td width="20%" align="center" valign="top"><table width="87%" border="0" align="left" cellpadding="10" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <?php
		  $qry=mysql_query("select * from category");
		  echo '<ul>';
		  while($row=mysql_fetch_array($qry))
		  {
		  ?>
        <tr>
          <td><?php echo '<li class="bottom" style="list-style:none"><a href="index.php?catid='.$row['id'].'">'.$row['category'].'</a></li>';
		  		if($_REQUEST['catid']==$row['id'])
				{ 
		  			echo '<ul type="square">';
					$pqry=mysql_query("select * from product where catid=".$row['id']."");
					while($prow=mysql_fetch_array($pqry))
					{
					echo '<li><a href="index.php?catid='.$row['id'].'&pid='.$prow['id'].'">'.$prow['product'].'</a></li>';
		  			}
					echo '</ul>';
				}
		  ?></td>
        </tr>
        <?php
		  }
		  echo '</ul>';
		  ?>
      </table>
        <p class="txt1">&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td align="center" valign="top"><p>&nbsp;</p>
       <?php
	  $pid3=$_REQUEST['pid'];
	  if($pid3!="")
	  {
	  $q3=mysql_query("select * from product where id=$pid3");
	  $r3=mysql_fetch_array($q3);
	  ?>
	  <table width="239" height="221" border="0" cellpadding="10" bgcolor="#EAD5FF">
        <tr>
          <td colspan="2" align="center"><?php echo '<img src="product/'.$r3['product_image'].'" width="80" height="80">'; ?></td>
          </tr>
        <tr>
          <td width="78" align="left" valign="top"><strong>Product</strong></td>
          <td width="76" align="left" valign="top">: <?php echo $r3['product']; ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><strong>Price</strong></td>
          <td align="left" valign="top">: <?php echo $r3['price']; ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><strong>Quantity</strong></td>
          <td align="left" valign="top">: <?php echo $r3['quantity']; ?></td>
        </tr>
        <tr>
          <td align="left" valign="top"><strong>Description</strong></td>
          <td align="left" valign="top">: <?php echo $r3['description']; ?></td>
        </tr>
      </table>
	  <?php
	  }
	 else
	  {
	  ?>
      <table width="35%" height="112" border="0" cellpadding="10" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php
		foreach($img2 as $img3)
		{
		
		?>
        <tr>
          <?php
			for($i=0;$i<count($img3);$i++)
			{
			?>
          <td><?php echo '<a href="product/'.$img3[$i].'" target="_blank"><img src="product/'.$img3[$i].'" width="80" height="80"></a>'; ?> <?php echo '<br>';
		  echo '  <a href="product/'.$img3[$i].'">View</a>'; ?> </td>
          <?php
		  }
		  ?>
        </tr>
        <?php
		}
		?>
      </table>
	  <?php
	  }
	  ?>
      <p class="style1">&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>      <p></p></td>
      <td align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><?php include("include/footer.php");?></td>
    </tr>
  </table>
</form>
</body>
</html>
