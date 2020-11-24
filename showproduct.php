<?php
    require("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
    #popup{
    top: 40%;
    height: 350px;
    width: 600px;
    padding: 50px;
    box-shadow: 0 5px 30px rgba(0,0,0,.30);
    background: #fff; 
}
#popupa{
    position: relative;
    padding: 5px 20px;
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;color: #fff;
    background: #111;
}
@media only screen and (max-width: 910px)
{
    #popup{
        width: 100%;
        height: 100%;
        box-shadow: 1px 1px 4px 1px rgba(0,0,0,0.5);
    }
}
@media only screen and (max-width: 360px)
{
    #popup{
        width: 100%;
        height: 100%;
    }
}
</style>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <!-- product content -->
     <center>
    <div class="row container" >
        <div id="onsale_section" class="title-box" style="width: 183px;">
    <h2 > Product Details</h2>      
    </div>
        <div class="col s12 m12 grey" style="height:1%"></div>
    </div>
    <?php
        $f = 0;
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }else{
            $f = -1;
        }
        if($f!=-1){ 
            $run = mysqli_query($con,"SELECT * FROM products WHERE product_id='{$id}' limit 1");
    # code...
if ($run) {
    # code...
    while ($row = mysqli_fetch_array($run)){
        $id  = $row['product_id'];
            $name = $row['product_title'];
        $image = $row['product_image'];
        $dbprice = $row['product_price'];
        $discount = $row['product_discount'];
        $desc = $row['product_desc'];
        $quantity = $row['product_quantity'];
       if ($discount >1) {
                $gross_price = ($dbprice*$discount)/100 ;
                $price = $dbprice-$gross_price;
            }else{
                $price = $dbprice;
            }
    }}
                $flag=1;
            ?>
           <div id="popup">
                <strong><h2><?php echo"$name"?><?php if ($quantity <= 0) {
            echo "<span style='color: green;'>&nbsp (Out of stock)</span>";
        } ?></h2></strong>
                <div class="col-md-6" >
                    <img id="example" src="img/<?php echo"$image"?>" alt=" " class="img-responsive" style = "height: 150px;width: 150px;">
                    <h3><span style="color: red;">&nbsp (<?php echo("$discount").'% off'?>)</span></h3>
                </div>
                <div class="col-md-6">
                        <strong><h4>Description :</h4></strong>
                        <p><?php echo"$desc"?></p>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h4><?php echo"$price"?>₹ <span><?php if($price = $dbprice)echo ""; else echo"$dbprice"."₹"?></span></h4>
                        </div>
                    </div>
                </div>
               <a id="popupa" href="process.php?id=<?php echo($id) ?>" onclick="toggle()"> Add To Cart</a>
           </div>
        <?php 
        }
        ?>
<!-- you may also like----->
    <section class="new-products" >
    <div class="container">
    <div id="apple-section" class="title-box">
    <h2>you also like</h2>      
    </div>
    <div class="row">
<?php 
    $run = mysqli_query($con,"SELECT DISTINCT * FROM products where product_cat = 4 and  active=1 limit 4 ")  or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($run)) {
        $id  = $row['product_id'];
        $name = $row['product_title'];
        $image = $row['product_image'];
        $dbprice = $row['product_price'];
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
</div>  
</section>
    <!-- Footer -->
   <?php
include("footer.php");
?>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/myjs.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
</body>
</html>