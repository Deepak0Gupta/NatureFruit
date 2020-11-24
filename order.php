<?php
    require("db.php");
include("header.php");
error_reporting(E_ERROR | E_PARSE);
if (isset($_SESSION['username'] )) {
	$username = $_SESSION['username'];
	$userid = mysqli_query($con,"SELECT * FROM accounts WHERE username='{$username}' limit 1");
	if ($userid) {
	while ($row = mysqli_fetch_array($userid)){
		$uid = $row['uid'];
		$username  = $row['username'];
		$email = $row['email'];
		}
	}
	$stockcount = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$uid}'");
	if(mysqli_num_rows($stockcount) >0){
	while ($row = mysqli_fetch_array($stockcount)){
		$product_title = $row['product_title'];
		$p_quantity = $row['p_quantity'];
	}
	}
$items = array();
$sql= "SELECT CONCAT(product_title,'(',p_quantity,')') AS Itemqty FROM cart";
$result = mysqli_query($con, $sql)or die(mysqli_error($con));
if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_assoc($result)) {
		$items[] = $row['Itemqty'];
	}
	$allitems = implode(", ", $items);
}
	$run = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$uid}'");
	if(mysqli_num_rows($run) >0){
$grandtotal = $_GET['gt'];
$Taxes = round($grandtotal*18/100);
$totalprice = $grandtotal +$Taxes;
	if (isset($_POST['place_order'])) {
	$phonenumber = mysqli_real_escape_string($con , $_POST['phone_number']);
	$add1 = mysqli_real_escape_string($con , $_POST['add1']);
	/*
	addin product into a new table foer analising   **/
                    $run = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$uid}'");
                    if(mysqli_num_rows($run) >0){
                      while ($row = mysqli_fetch_array($run)){
	                      $pname  = $row['product_title'];
	                      $pqty = $row['p_quantity'];
	                      $insertquary = "INSERT INTO `dataset`(`pname`, `pqty`) VALUES ('$pname' , '$pqty')";
	                      $runquary = mysqli_query($con,$insertquary)or  die(mysqli_error($con));
	                      }
                  }
                  $freqItems = array();
                  $freqItemsets = "SELECT CONCAT(product_title,' ') AS freqItemsets FROM cart WHERE uid='{$uid}'";
                  $resultoffreqItemsets = mysqli_query($con, $freqItemsets)or die(mysqli_error($con));
                    if(mysqli_num_rows($resultoffreqItemsets)>0){
					while ($row = mysqli_fetch_assoc($resultoffreqItemsets)) {
							$freqItems[] = $row['freqItemsets'];
						}
						$Itemsforapriori = implode(", ", $freqItems);
					}
					$myfile = fopen("Apriori-Algorithm-master/dataset.txt", "a")or die("Unable to open file!");
					$txt = "$Itemsforapriori\n";
					fwrite($myfile, $txt);
					fclose($myfile);
					$tuncatequery = mysqli_query($con," TRUNCATE TABLE `apriori-algorithm` ")or  die(mysqli_error($con));
					if ($tuncatequery) {
						require("class.apriori.php");
					}
	    $query = "INSERT INTO `orders`(`username`, `product_name`, `total_price`, `product_total_price`, `address1`) VALUES('$username','$allitems','$totalprice','$grandtotal','$add1')";
      $fire =  mysqli_query($con,$query)or  die(mysqli_error($con));
      if ($fire) {
      	$stockcount = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$uid}'");
				if(mysqli_num_rows($stockcount) >0){
				while ($row = mysqli_fetch_array($stockcount)){
					$product_title = $row['product_title'];
					$p_quantity = $row['p_quantity'];
					$quary = "SELECT product_quantity FROM products WHERE product_title='$product_title'";
					$actualproductquantity = mysqli_query($con,$quary) or die(mysqli_error($con));
						if($actualproductquantity){
						while($row1 = mysqli_fetch_assoc($actualproductquantity)){
							$actualproductquantity = $row1['product_quantity'];
        	$stock = "UPDATE `products` SET `product_quantity`= '$actualproductquantity' - '$p_quantity'  WHERE product_title = '$product_title'" ;
      		$update =  mysqli_query($con,$stock)or  die(mysqli_error($con));
      		}
				}
				}
						}
				if ($update) {
      	$dquery = "DELETE  FROM `cart` WHERE uid = '$uid'";
      	$delete =  mysqli_query($con,$dquery)or  die(mysqli_error($con));
		      	if ($delete) {
		      		     echo '<div class="card mb-4">
		         <div class="text-center">
				<h1 class="diaplay-4 mt-2 text-danger">Thank Tou!</h1>
				<h2 class="text-success">Youre Order Placed Successfully!</h2>
				<h4 class="bg-danger text-light rounded p-2"> Items Purchased : '.$allitems.'</h4>
				<h4>Your Name : '.$username.'</h4>
				<h4>Your Email : '.$email.'</h4>
				<h4>Your Phone Number : '.$phonenumber.' </h4>
				<h4>Total Ammount Paid: '.$totalprice.'₹</h4>
				<a href="index.php" class="btn btn-primary col-lg-3">Contine Shopping</a>
			</div>
			</div>';
			include('footer.php');
		      	}
        	//echo "<script>
    //alert('Order placed');
   // window.open('http://localhost/project-php/', '_self');</script>";
      }else{
        echo "fail";
      }
}
	}
}else{
	echo "<script >
			alert('your cart is empty!');
		window.open('viewcart.php', '_self');</script>";
}
}else{
	echo "<script >
			alert('you need to login first');
			window.open('login.php', '_self');</script>";
}
	?>
