<?php
	session_start();
    require("db.php");
if (isset($_SESSION['username'])) {
 $pid = $_GET['id'];
$username = $_SESSION['username'];
$userid = mysqli_query($con,"SELECT uid FROM accounts WHERE username='{$username}' limit 1");
if ($userid) {
	while ($row = mysqli_fetch_array($userid)){
		$uid  = $row['uid'];
	}
}else{
	echo"something went wrong";
}
# for cart item
$run = mysqli_query($con,"SELECT * FROM products WHERE product_id='{$pid}'");
if ($run) {
	while ($row = mysqli_fetch_array($run)){
		$id  = $row['product_id'];
		$name = $row['product_title'];
		$stock  = $row['product_quantity'];
		$image = $row['product_image'];
		$price = $row['product_price'];
}
if (($stock) > 0) {
	# code...
$duplicate = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$uid}' and product_title ='{$name}' ");
if (mysqli_num_rows($duplicate)) {
	echo "<script>
		alert('product already added in your cart');
		window.open('index.php', '_self');</script>";
	# code...
}else{
	$quer1 = "insert into cart (uid, product_id ,product_title) VALUES  ('$uid','$pid','$name')" ;
			$run= mysqli_query($con,$quer1) or die(mysqli_error($con));
		if ($run) {
			echo "<script>
		alert('product added in your cart');
		window.open('index.php', '_self');</script>";
		}else
		{
			echo "fail";
		}		
}
	}else{
		echo "<script>
		alert('product is out of stock');
		window.open('index.php', '_self');</script>";
	}
}
} else {
		?>
		<script type="text/javascript">
			var flag = alert('you need to login first');
			if (true) {window.open("login.php", "_self");}
			</script>
			<?php
	}
#main code
?>