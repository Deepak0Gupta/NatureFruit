<?php  
	   require("db.php");
		include("header.php");
		?>
<link rel="stylesheet" type="text/css" href="fullpage.css">
		<?php
		if (isset($_SESSION['username'] )) {
			$username = $_SESSION['username'];
			$accountsinfo = mysqli_query($con,"SELECT * FROM accounts WHERE username='{$username}' limit 1");
				if ($accountsinfo) {
				while ($row = mysqli_fetch_array($accountsinfo)){
					$phone_number  = $row['phone_number'];
					$email = $row['email'];
					}
				}
			$order = "SELECT * FROM `Orders` WHERE username = '$username'";
		      	$orquery =  mysqli_query($con,$order)or  die(mysqli_error($con));
		      	if(mysqli_num_rows($orquery) >0){
					while ($row = mysqli_fetch_array($orquery)){
						$id = $row['id'];
						$product_name = $row['product_name'];
						$total_price = $row['total_price'];
						$address1 = $row['address1'];
						$city = $row['city'];
						$order_date = $row['order_date'];
						?>
						<div class="card mb-4">
					         <div class="text-center">
							<h1 class="diaplay-4 mt-2 text-danger">NatureFruit.com</h1>
							<h2 class="text-success">Your Orders!</h2>
							<h4 class="bg-danger text-light rounded p-2"> Items Purchased : <?php echo "$product_name"; ?></h4>
							<h4><b>Your Name :</b> <?php echo "$username"; ?></h4><hr>
							<h4><b>Your Email : </b><?php echo "$email"; ?></h4><hr>
							<h4><b>Your Phone Number :</b> <?php echo "$phone_number"; ?></h4><hr>
							<h4><b>Total Ammount Paid: </b><?php echo "$total_price"; ?>₹</h4><hr>
							<h4><b>Shipping Address:</b> <?php echo "$address1","$city"; ?></h4><hr>
							<h4><b>Order Date :</b> <?php echo "$order_date"; ?> </h4><hr>
							<a href="recipt.php?id=<?php echo($id) ?>"><button class="btn btn-primary">
  							<i class="fa fa-download"></i> Download Recipt
							</button></a>
						</div>
						</div>
						<?php
					}
					}else{
						echo '<div class="card mb-4">
				         <div class="text-center">
						<h1 class="diaplay-4 mt-2 text-danger">NatureFruit.com</h1>
						<h2 class="text-success">Your Orders!</h2>
						<h4 class="bg-danger text-light rounded p-2">No Transection Yet!</h4>
					</div>
					</div>';
				}
			include('footer.php');
		}else{
			echo "<script >
			alert('you need to login first');
			window.open('login.php', '_self');</script>";
		}
?>