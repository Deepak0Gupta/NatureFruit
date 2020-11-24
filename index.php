<?php
    require("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>nature.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include("header.php");
	?>
<div class="slider">
	<div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/organicfruit.jpg" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="img/nagpurorange.jpg" class="d-block w-100" >
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
</section>
<!--              on sale   -----------------------  -->
<section class="on-sale">
<div  class="container">
	<div id="onsale_section" class="title-box">
	<h2 > on sale</h2>		
	</div>
	<div class="row">
		<?php 
	$run = mysqli_query($con,"SELECT * FROM products WHERE product_cat = 1 and active=1 ");
	while ($row = mysqli_fetch_array($run)) {
		$id  = $row['product_id'];
		$name = $row['product_title'];
		$image = $row['product_image'];
		$dbprice = $row['product_price'];
		$discount = $row['product_discount'];
		$quantity = $row['product_quantity'];+
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
	<a href="whishlistprocess.php?id=<?php echo($id) ?>">
	<button type="button" class="btn btn-secondary" title="Add to Wish list">
		<i class="fa fa-heart-o"></i>
	</button></a>
	<a href="process.php?id=<?php echo($id) ?>">
	<button type="button" class="btn btn-secondary" title="Add to Cart" name="addCart">
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
		} ?><span style="color: red;">&nbsp (<?php echo("$discount").'% off'?>)</span></h2>
                                <input type="hidden" name="name" value="<?php echo($name) ?>">
		<h2><?php echo("$price")?>/kg<span style="text-decoration: line-through;padding-left: 5px;color: #E44236;font-size: 15px		;"><?php echo("$dbprice").'₹'?></span></h2>
	</div>
	</div>
		<?php
	}
	?>
</div>
	</div>		
</section>
<!-- -----------------------------new products---------------->
<section class="new-products">
	<div class="container">
	<div class="title-box">
	<h2>New Products</h2>		
	</div>
	<div class="row">
		<?php 
	$run = mysqli_query($con,"SELECT * FROM products WHERE product_cat = 6 and active=1");
	while ($row = mysqli_fetch_array($run,MYSQLI_BOTH)) {
		$id  = $row['product_id'];
		$name = $row['product_title'];
		$image = $row['product_image'];
		$price = $row['product_price'];
		$quantity = $row['product_quantity'];
		?>
			<div class="col-md-3">
	<div class="product-top">
	<img src="img/<?php echo($image)?>">
	<div class="overlay-right">
<a href="showproduct.php?id=<?php echo($id) ?>">
	<button type="button" class="btn btn-secondary" title="Quick shop">
		<i class="fa fa-eye"></i>
	</button></a>
	<a href="whishlistprocess.php?id=<?php echo($id) ?>">
	<button type="button" class="btn btn-secondary" title="Add to Wish list">
		<i class="fa fa-heart-o"></i>
	</button></a>
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
			echo "<span style='color: green; font-size: 18px;'>&nbsp (Out of stock)</span>";
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
</div>	
</section>
<hr class="he">
<!-----------------------website  freatures--------------------->
<section class="website-features">
<div class="container">
<div class="row">
<div class="col-md-3 feature-box">
<img src="img/organic.jpg">
<div class="feature-text">
<p><b>100% organic products </b>are available at shop</p>	
</div>	
</div>
<div class="col-md-3 feature-box">
<img src="img/de.png">
<div class="feature-text">
<p><b>Free Delivery of products </b> above 300 of shoping</p>	
</div>	
</div>
<div class="col-md-3 feature-box">
<img src="img/coustomer-services.png">
<div class="feature-text">
<p><b>Customer Service</b> Support On WhatsApp/Telephone</p>	
</div>	
</div>
<div class="col-md-3 feature-box">
<img src="img/secure-payment.png">
<div class="feature-text">
<p><b>Secure Payments</b>100% Refund Within 3 days</p>	
</div>	
</div>
</div>	
</div>
</section>
<!--=============================footer==========--->
<?php
include("footer.php");
?>
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
</body>
</html>