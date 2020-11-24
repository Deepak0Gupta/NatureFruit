<?php
	require("db.php");
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="utf-8">
    <title>nature.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="fullpage.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
	#cartimage{
		height: 50px;
		width: 80px;
	}
	table tr td{
		align-content: center;
		align-items: center;
	}
	@media only screen and (max-width: 360px){
		table tbody tr{
		width: 350px;
		font-size: 10px;
	}
	table tbody tr th{
		width: 50%;
		white-space: 0px;
		font-size: 9px;
		padding-left: 5px;
	}
	#proceedbtn{
		margin-left: 10px
		width: 10px;
		border: 1px solid bold;
		justify-content: center;
	}
	#cartimage{
		height: 20px;
		width: 30px;
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
			<th  >Update</th>
			<th >Delete</th>
			<th  >name</th>
			<th  >Image</th>
			<th  >Price</th>
			<th   >quantiy</th>
			<th >Total</th>
		</tr>
</table>
 <?php 
$grandtotal = 0;
	$run = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$userid}'");
	if(mysqli_num_rows($run) >0){
		while ($row = mysqli_fetch_array($run)){
		$pid  = $row['product_id'];
		$id = $row['id'];
		$pqty = $row['p_quantity'];
		$runpid = mysqli_query($con,"SELECT * FROM products WHERE product_id='{$pid}'") or die("error");
		if(mysqli_num_rows($runpid) >0){
		while ($rowpid = mysqli_fetch_array($runpid)){
			$name = $rowpid['product_title'];
			$image = $rowpid['product_image'];
			$dbprice = $rowpid['product_price'];
			$discount = $rowpid['product_discount'];
			$quantity = $rowpid['product_quantity'];
			if ($discount >1) {
				$gross_price = ($dbprice*$discount)/100 ;
				$price = $dbprice-$gross_price;
			}else{
				$price = $dbprice;
			}
			?>
<table class="table">
			<?php
			$bill = ($price * $pqty);
			@$grandtotal  += $price*$pqty;
			$sno = 1;
			echo"<tr>";
			echo"<td ><input id='btn' type='submit' name='update[]' value='".$id."' class='btn btn-warning'></input></td>";
			echo"<td id='th'><input id='btn' type='submit' name='delete[]' value='".$id."' class='btn btn-danger'></input> </td>";
			echo"<td id='th'>".$name."</td>";
			echo"<td id='th1'><img id='cartimage' src='img/".$image."'></td>";
			echo"<td id='th1'>".$price."₹</td>";
			echo"<input  type='hidden' name='id[]' value='".$id."'></input>";
			echo"<td id='th1'><input style='width : 40px;' type='number' min = 1 max = $quantity name='qty[]' value='".$pqty."'></input>/kg</td>";
			echo"<td id='th1'>".$bill."</td>";
			?>
</table>
			<?php
		}	
	}
}
}else{
		?>
<div style="margin: 50px 50px 50px 50px;">
		<center><h3>your cart is empty</h3></center>
	</div>
<?php 
	}
 ?>
</form>
<br>
<br>
<hr>
<center><h5> Sub Total = <?php echo "$grandtotal"; ?></h5></center>
<?php 
if (isset($_POST['qty'])) {
$qty = $_POST['qty'];
	foreach ($qty as $q) {}}
if(isset($_POST['update']) ){
	$update = $_POST['update'];
	if (isset($_POST['qty'])) {
		$qty = $_POST['qty'];
	foreach ($update as $id) {
			$query = "UPDATE cart set p_quantity = '$q'  WHERE id= '$id '" or  die(mysqli_error($con));
			$fire =  mysqli_query($con,$query)or  die(mysqli_error($con));
			echo "<script>
window.open('viewcart.php', '_self');</script>";
		}
		}
		# code...
	}
if(isset($_POST['delete']) ){
		$delte = $_POST['delete'];
		foreach ($delte as $id) {
		$query = "DELETE FROM `cart` WHERE id= '$id'" or die("syntax error");
			$fire =  mysqli_query($con,$query);
			echo "<script>
window.open('viewcart.php', '_self');</script>";
		}
}
?>
 <br>
 <br><a href="index.php" class="btn btn-primary col-lg-3"  id="proceedbtn">Contine Shopping</a>
<form method="post" action="">
 <a href="checkout.php?gt=<?php echo($grandtotal) ?> " class="btn btn-primary col-lg-3" name="checkout" id="proceedbtn">Chackout</a>
</form>
 <?php
?>
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
