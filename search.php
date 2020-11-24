<?php
    require("db.php");
include('header.php');
?>
<div class="slider">
	<div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item">
      <img src="img/organicfruit.jpg" class="d-block w-100" >
    </div>
    <div class="carousel-item active">
      <img src="img/indianapple.jpg" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="img/SLIDER.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/SLIDER PEAR.jpg" class="d-block w-100">
    </div>
  </div>
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
    <li data-target="#slider" data-slide-to="3"></li>
  </ol>
</div>
</div>
 <section class="new-products" >
	<div class="container">
	<div id="apple-section" class="title-box">
	<h2>Your Result</h2>		
	</div>
	<div class="row">
<?php
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
$id = $_GET['q'];
$sql = "select *  from products where product_title like '%".$id."%' " or die( $conn->error);;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 	$id  = $row['product_id'];
		$name = $row['product_title'];
		$image = $row['product_image'];
		$dbprice = $row['product_price'];
		$quantity = $row['product_quantity'];
		$discount = $row['product_discount'];
		$gross_price = ($dbprice*$discount)/100 ;
		$price = $dbprice-$gross_price;
 	?>
 		<div class="col-md-3">
	<div class="product-top">
	<img src="img/<?php echo($image)?>">
	<div class="overlay-right">
<a href="showproduct.php?id=<?php echo($id) ?>">
	<button type="button" class="btn btn-secondary" title="Quick shop">
		<i class="fa fa-eye"></i>
	</button></a>
	<button type="button" class="btn btn-secondary" title="Add to Wish list">
		<i class="fa fa-heart-o"></i>
	</button>
	<a href="process.php?id=<?php echo($id) ?>">
	<button type="submit" class="btn btn-secondary" title="Add to Cart" name="addCart">
		<i class="fa fa-shopping-cart"></i>
	</button></a>
	</div>
	</div>
	<div class="product-bottom text-center">
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star-half-o"></i>
		<br>
	<h2><?php echo("$name")?><?php if ($quantity <= 0) {
			echo "<span style='color: green;'>&nbsp (Out of stock)</span>";
		} ?><?php if($discount != 0 ){  ?><span style="color: red;">&nbsp (<?php echo("$discount").'% off'?>)</span> <?php }?></h2>
                                <input type="hidden" name="name" value="<?php echo($name) ?>">
                                <input type="hidden" name="price" value="<?php echo($price) ?>">
		<h2><?php echo("$price")?>/kg<span style="text-decoration: line-through;padding-left: 5px;color: #E44236;font-size: 15px;"><?php 
		if ($price != $dbprice) echo("$dbprice").'₹'
		?></span></h2>
	</div>
	</div>
		<?php
	}
 }
 else {
 	?>
   <center style="margin-left:450px;"> <h2>No Result found</h2></center>
<?php
}
$conn->close();
	?>
</div>
</div>	
</section>
<!-- you may also like----->
	<section class="new-products" >
	<div class="container">
	<div id="apple-section" class="title-box">
	<h2>you also like</h2>		
	</div>
	<?php
	// ====for uid=================
	$username = $_SESSION['username'];

		$userid = mysqli_query($con,"SELECT uid FROM accounts WHERE username='{$username}' limit 1");
		if (mysqli_num_rows($userid)>0) {
			while ($row4 = mysqli_fetch_array($userid)){
				$uid  = $row4['uid'];
			}
				// ====for cart product=================
		$cart = mysqli_query($con,"SELECT product_title FROM cart WHERE uid='{$uid}'");
		if (mysqli_num_rows($cart)>0) {
				?>
									<div class="row">
										<?php 
			while ($row0 = mysqli_fetch_array($cart)){
				$product_title  = $row0['product_title'];
				$apriori = mysqli_query($con,"SELECT DISTINCT  `recoment` FROM `apriori-algorithm` where `product_name` like '%".$product_title."%'")or die(mysqli_error($con));
						if (mysqli_num_rows($apriori)>0) {
								while ($row1 = mysqli_fetch_array($apriori)){
									$recoment[]  = $row1['recoment'];
									}
									 $unique = array_unique($recoment);
						}
								}
foreach ($unique as $key ){
						$run = mysqli_query($con,"SELECT  * FROM products where product_title like '$key' and  active=1 limit 1 ")  or die(mysqli_error($con));
						while ($row = mysqli_fetch_array($run)) {
							$id  = $row['product_id'];
							$name = $row['product_title'];
							$image = $row['product_image'];
							$dbprice = $row['product_price'];
							$discount = $row['product_discount'];
							$quantity = $row['product_quantity'];
							$gross_price = ($dbprice*$discount)/100 ;
							$price = $dbprice-$gross_price;
							?>
								<div class="col-md-3">
						<div class="product-top">
						<img src="img/<?php echo($image)?>">
						<div class="overlay-right">
					<a href="showproduct.php?id=<?php echo($id) ?>">
						<button type="button" class="btn btn-secondary" title="Quick shop">
							<i class="fa fa-eye"></i>
						</button></a>
						<button type="button" class="btn btn-secondary" title="Add to Wish list">
							<i class="fa fa-heart-o"></i>
						</button>
						<a href="process.php?id=<?php echo($id) ?>">
						<button type="submit" class="btn btn-secondary" title="Add to Cart" name="addCart">
							<i class="fa fa-shopping-cart"></i>
						</button></a>
						</div>
						</div>
						<div class="product-bottom text-center">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<br>
						<h2><?php echo("$name")?><?php if ($quantity <= 0) {
								echo "<span style='color: green;'>&nbsp (Out of stock)</span>";
							} ?></h2>
					                                <input type="hidden" name="name" value="<?php echo($name) ?>">
					                                <input type="hidden" name="price" value="<?php echo($price) ?>">
							<h2><?php echo("$price")?>/kg</h2>
						</div>
						</div>
							<?php
						}
}
								?>
									</div>
								<?php
							}





							}
else{
								//                        if not log in       
								?>
								<div class="row">
					<?php 
						$run = mysqli_query($con,"SELECT * FROM products WHERE product_cat = 4 or product_title = 'Papayas' or product_title = 'Indian Peirs' or product_title = 'Indian Apples' and active=1 ")  or die(mysqli_error($con));
						while ($row = mysqli_fetch_array($run)) {
							$id  = $row['product_id'];
							$name = $row['product_title'];
							$image = $row['product_image'];
							$dbprice = $row['product_price'];
							$discount = $row['product_discount'];
							$quantity = $row['product_quantity'];
							$gross_price = ($dbprice*$discount)/100 ;
							$price = $dbprice-$gross_price;
							?>
								<div class="col-md-3">
						<div class="product-top">
						<img src="img/<?php echo($image)?>">
						<div class="overlay-right">
					<a href="showproduct.php?id=<?php echo($id) ?>">
						<button type="button" class="btn btn-secondary" title="Quick shop">
							<i class="fa fa-eye"></i>
						</button></a>
						<button type="button" class="btn btn-secondary" title="Add to Wish list">
							<i class="fa fa-heart-o"></i>
						</button>
						<a href="process.php?id=<?php echo($id) ?>">
						<button type="submit" class="btn btn-secondary" title="Add to Cart" name="addCart">
							<i class="fa fa-shopping-cart"></i>
						</button></a>
						</div>
						</div>
						<div class="product-bottom text-center">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<br>
						<h2><?php echo("$name")?><?php if ($quantity <= 0) {
								echo "<span style='color: green;'>&nbsp (Out of stock)</span>";
							} ?></h2>
					                                <input type="hidden" name="name" value="<?php echo($name) ?>">
					                                <input type="hidden" name="price" value="<?php echo($price) ?>">
							<h2><?php echo("$price")?>/kg</h2>
						</div>
						</div>
							<?php
						}
						?>
					</div>
								<?php  
							}
					// ====for recementation=================
						?>
</div>	
</section>
 <?php
include('footer.php');
?>
