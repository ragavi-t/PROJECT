<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$gqry=mysql_query("select * from product");
$select = mysql_query("SELECT * FROM user_purchase ORDER BY id DESC");
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
      <td colspan="2" align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td width="12%" align="center" valign="top"><p>&nbsp;</p>
        <h3>&nbsp;</h3>
       <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      <td width="88%" align="center" valign="top"><h3>&nbsp;
        </h3>
        <h3>Report </h3>
        <h3>
          <select name="month">
            <option value="">-Month-</option>
            <?php
		  $q1=mysql_query("select distinct(month1) from user_purchase");
		  while($r1=mysql_fetch_array($q1))
		  {
		  ?>
            <option <?php if($month==$r1['month1']) echo "selected"; ?>><?php echo $r1['month1']; ?></option>
            <?php
		  }
		  ?>
                            </select>
          &nbsp;
          <select name="year">
            <option value="">-Year-</option>
            <?php
		  $q1=mysql_query("select distinct(year1) from user_purchase");
		  while($r1=mysql_fetch_array($q1))
		  {
		  ?>
            <option <?php if($year==$r1['year1']) echo "selected"; ?>><?php echo $r1['year1']; ?></option>
            <?php
		  }
		  ?>
                            </select>
          &nbsp;
          <input type="submit" name="btn" value="Submit" />
                      </h3>
        <p>
          <?php
	  
	  if(isset($btn))
	  {
	  $q3=mysql_query("select pname,count(pname) from user_purchase where month1='$month' && year1='$year' group by pname");
	  while($r3=mysql_fetch_array($q3))
	  {
	  //$pn=$r3['count(pname)'];
	  //echo $pn;
	  $key=$r3['pname'];
	  $q4=mysql_query("select * from user_purchase where month1='$month' && year1='$year' && pname='$key'");
	  $n4=mysql_num_rows($q4);
	  $q5=mysql_query("select * from user_purchase where month1='$month' && year1='$year'");
	  $n5=mysql_num_rows($q5);
	  
	  $per=($n4/$n5)*100;
	  $per2=round($per,2);
	  $val=$r3['count(pname)'];
	  $values[$key]=$per2;
	  }
	  arsort($values);
	  //print_r($xx);
	   # ------- The graph values in the form of associative array
	/*$values=array(
		"Laptop" => 30,
		"Mobile" => 60,
	);*/

 
	$img_width=550;
	$img_height=400; 
	$margins=20;

 
	# ---- Find the size of graph by substracting the size of borders
	$graph_width=$img_width - $margins * 2;
	$graph_height=$img_height - $margins * 2; 
	$img=imagecreate($img_width,$img_height);

 
	$bar_width=20;
	$total_bars=count($values);
	$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);

 
	# -------  Define Colors ----------------
	$bar_color=imagecolorallocate($img,100,150,200);
	$txt_color=imagecolorallocate($img,10,10,10);
	$background_color=imagecolorallocate($img,240,240,150);
	$border_color=imagecolorallocate($img,50,200,50);
	$line_color=imagecolorallocate($img,200,200,200);
 
	# ------ Create the border around the graph ------

	imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
	imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);

 
	# ------- Max value is required to adjust the scale	-------
	$max_value=max($values);
	$ratio= $graph_height/$max_value;

 
	# -------- Create scale and draw horizontal lines  --------
	$horizontal_lines=20;
	$horizontal_gap=$graph_height/$horizontal_lines;

	//for($i=1;$i<=$horizontal_lines;$i++){
	for($i=0;$i<=100;$i+=5){
		$y=$img_height - $margins - $horizontal_gap * $i ;
		//imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
		$v=intval($horizontal_gap * $i /$ratio);
		//imagestring($img,0,5,$y-5,$v,$txt_color);
		
		imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
		imagestring($img,0,5,$y-5,$v,$txt_color);

	}
 
 
	# ----------- Draw the bars here ------
	for($i=0;$i< $total_bars; $i++){ 
		# ------ Extract key and value pair from the current pointer position
		list($key,$value)=each($values); 
		$x1= $margins + $gap + $i * ($gap+$bar_width) ;
		$x2= $x1 + $bar_width; 
		$y1=$margins +$graph_height- intval($value * $ratio) ;
		$y2=$img_height-$margins;
		imagestring($img,0,$x1+3,$y1-10,$value,$txt_color);
		imagestring($img,0,$x1+3,$img_height-15,$key,$txt_color);		
		imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
	}
	//header("Content-type:image/png");
	imagepng($img,"chart/img1.png");

		
echo '<img src="chart/img1.png">';	  

	   }//btn
	   ?>
        </p>
      <p>&nbsp;</p>
      <p>&nbsp; </p></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
