<?php
    require("db.php");
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="utf-8">
    <title>nature.com/apples</title>
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
      <img src="img/indianapple.jpg" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="img/organicfruit.jpg" class="d-block w-100" >
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
<!-- -----------------------------new products---------------->
<section class="new-products" >
	<div class="container">
	<div id="most-purchesed-section" class="title-box">
	<h5>Most Purchesed</h5>		
	</div>
	<div class="row">
		<?php 
	$run = mysqli_query($con,"SELECT * FROM products WHERE product_cat = 4 or product_title = 'Papayas' or product_title = 'Indian Peirs' or product_title = 'Indian Apples' and active=1") or die(mysqli_error($con));
	if ($run) {
	while ($row = mysqli_fetch_array($run)) {
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
</div>	
</section>
<hr class="he">
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