<?php
	require("db.php");
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
    <link rel="stylesheet" type="text/css" href="fullpage.css">
<style type="text/css">
	#cartimage{
		height: 50px;
		width: 80px;
	}
	table tr td{
		align-content: center;
		align-items: center;
	}
@media only screen and (max-width: 1000px){
#th1{
	padding-right: 50px;
}
}
	@media only screen and (max-width: 360px){
		table tbody tr {
		font-size: 15px;
	}
	table tbody tr th{
		font-size: 10px;
	}
	#proceedbtn{
		margin-left: 10px
		width: 10px;
		border: 1px solid bold;
	}
	#cartimage{
		height: 30px;
		width: 45px;
	}
	#btn{
		width: 30px;
		font-size: 8px;
	}
}
</style>
</head>
<?php 
include("header.php");
$username = $_SESSION['username'];
if (empty($username)) {
	echo "<script >
			alert('you need to login first');
			window.open('login.php', '_self');</script>";
}
$useridquery = mysqli_query($con,"SELECT uid FROM accounts WHERE username='{$username}' limit 1");
if ($useridquery) {
	while ($row = mysqli_fetch_array($useridquery) ){
		$userid  = $row['uid'];
	}
}else{
	echo"something went wrong";
}
 ?>
 <form action="" method="post" enctype="multipart/form-data">
 <table class="table">
		<tr style="border : 1px ;">
			<th >Delete</th>
			<th  >name</th>
			<th  >Image</th>
			<th  >Price</th>
			<th  >Discount</th>
		</tr>
</table>
 <?php 
$grandtotal = 0;
	$run = mysqli_query($con,"SELECT * FROM wish_list WHERE uid='{$userid}'");
	if(mysqli_num_rows($run) >0){
		while ($row = mysqli_fetch_array($run)){
		$pid  = $row['product_id'];
		$id = $row['id'];
		$runpid = mysqli_query($con,"SELECT * FROM products WHERE product_id='{$pid}'") or die("error");
		if(mysqli_num_rows($runpid) >0){
		while ($rowpid = mysqli_fetch_array($runpid)){
			$name = $rowpid['product_title'];
			$image = $rowpid['product_image'];
			$dbprice = $rowpid['product_price'];
			$discount = $rowpid['product_discount'];
			if ($discount >1) {
				$gross_price = ($dbprice*$discount)/100 ;
				$price = $dbprice-$gross_price;
			}else{
				$price = $dbprice;
			}
			?>
<table class="table">
			<?php
			$sno = 1;
			echo"<tr>";
			echo"<td id='th'><input id='btn' type='submit' name='delete[]' value='".$id."' class='btn btn-danger'></input> </td>";
			echo"<td id='th'>".$name."</td>";
			echo"<td ><img id='cartimage' src='img/".$image."'></td>";
			echo"<td >".$price."₹</td>";
			echo"<input  type='hidden' name='id[]' value='".$id."'></input>";
			echo"<td id='th1' style='color: red;'>".$discount." %off Today</td>";
			?>
</table>
			<?php
		}
	}
}
}
	else{
		?>
<div style="margin: 50px 50px 50px 50px;">
		<center><h3>your WishList is empty</h3></center>
	</div>
<?php 
	}
 ?>
</form>
<br>
<br>
<hr>
<?php 
if(isset($_POST['delete']) ){
		$delte = $_POST['delete'];
		foreach ($delte as $id) {
		$query = "DELETE FROM `wish_list` WHERE id= '$id'" or die("syntax error");
			$fire =  mysqli_query($con,$query);
			echo "<script>
window.open('wishlist.php', '_self');</script>";
		}
}
?>
 <br>
 <br><a href="index.php" class="btn btn-primary col-lg-3"  id="proceedbtn">Contine Shopping</a>
<!--========================script tag  ==========================-->
<script type="text/javascript">
	function openmenu()
	{
		document.getElementById("side-menu").style.display="block";
		document.getElementById("menu-btn").style.display="none";
		document.getElementById("close-btn").style.display="block";
	}
	function closemenu()
	{
		document.getElementById("side-menu").style.display="none";
		document.getElementById("menu-btn").style.display="block";
		document.getElementById("close-btn").style.display="none";
	}
</script>
<!--==========================footer===========================--->
<!--=============================footer==========--->
<?php
include("footer.php");
?>
</body>
</html>
