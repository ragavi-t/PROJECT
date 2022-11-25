<div class="topnav" id="myTopnav">
  <a href="view_cus.php" class="active">&#2997;&#3007;&#2991;&#3006;&#2986;&#3006;&#2992;&#3007;</a>
  <a href="view_shop.php">&#2997;&#3007;&#2997;&#2970;&#3006;&#2991;&#3007;</a>
  <a href="logout.php">&#2997;&#3014;&#2995;&#3007;&#2991;&#3015;&#2993;&#3009;</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onClick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>