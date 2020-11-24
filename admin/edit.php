<?php
  require("db.php");
  if (isset($_SESSION['admin'])) {
$uname = $_SESSION['admin'];
  $usercount = mysqli_query($con,"SELECT * FROM accounts") or die(mysqli_error($con));
$total = mysqli_num_rows($usercount);
 $productcount = mysqli_query($con,"SELECT * FROM products") or die(mysqli_error($con));
$ptotal = mysqli_num_rows($productcount);
 $ordercount = mysqli_query($con,"SELECT * FROM `orders` WHERE 1") or die(mysqli_error($con));
$ototal = mysqli_num_rows($ordercount);
if(isset($_GET["id"])){
    $id = $_GET["id"];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Panal</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="users.php">Users</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo "$uname";?></a></li>
            <?php 
    if (isset($_SESSION['admin'] )) {
      ?>
            <li><a href="logout.php">Logout</a></li>
              <?php
    }else{
      ?>
       <li><a href="login.php">Login</a></li>
     <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <a href="add_new_product.php"><button class="btn btn-default " type="button" id="dropdownMenu1" aria-haspopup="true" aria-expanded="true">
                Add New Products
              </button></a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="products.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Products <span class="badge"><?php echo "$ptotal"; ?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo "$total"; ?></span></a>
                  <a href="orders.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Orders <span class="badge"><?php echo "$ototal"; ?></span></a>
            </div>
            <div class="well">
              <h4>Disk Space Used</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                      60%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                    40%
            </div>
          </div>
            </div>
              <div class="list-group">
              <a href="" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Categories Numbers
              </a>
              <p class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Onsale <span class="badge">1</span></p>
              <p class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Apples <span class="badge">2</span></p>
              <p class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> rare fruit <span class="badge">3</span></p>
              <p class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> mostpurchsed <span class="badge">4</span></p>
              <p class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> seasnalfruits <span class="badge">5</span></p>
              <p class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> newproduct <span class="badge">6</span></p>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
                         <?php
                      $run = mysqli_query($con,"SELECT * FROM products WHERE product_id = '$id' ");
                    if ($run) {
                        while ($row = mysqli_fetch_array($run)){
                            $id  = $row['product_id'];
                            $name = $row['product_title'];
                            $image = $row['product_image'];
                            $dbprice = $row['product_price'];
                            $discount = $row['product_discount'];
                            $desc = $row['product_desc']; 
                            $product_cat = $row['product_cat'];
                            $product_quantity = $row['product_quantity'];
                            $active = $row['active'];
                          }}
                            ?>
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Edit Page</h3>
              </div>
              <div class="panel-body">
                <form action="edit-process.php?id=<?php echo($id) ?>" method="post">
                  <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" class="form-control" name="pname" placeholder="Product Title" required value="<?php echo($name) ?>">
                  </div>
                    <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="pprice" placeholder="product price in Rupees" value="<?php echo($dbprice) ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Product Discription</label>
                    <textarea  class="form-control " name="pdesc" placeholder="Product Discription" required><?php echo($desc) ?>
                    </textarea>
                  </div>
                   <div class="form-group">
                    <label>Product Image</label>
                    <input type="text" name="pimage" class="form-control" placeholder="Product Image" value="<?php echo($image) ?>" required>
                  </div>
                  <div class="checkbox">
                    <?php if($active !=0){  ?>   <label>
                      <input type="checkbox" checked name="pactive"> active
                    </label>  <?php   } else{?>
                       <label>
                      <input type="checkbox" name="pactive"> active
                    </label>
                    <?php
                    }?>
                  </div>
                  <div class="form-group">
                    <label>product Quantity</label>
                    <input type="number" name="pqty" class="form-control" placeholder="Add product in stock in kgs..." value="<?php echo($product_quantity) ?>" required>
                  </div>
                  <div class="form-group">
                    <label><span class="glyphicon glyphicon-arrow-left" aria-hidden="true">&nbsp</span>product category</label>
                    <input type="number" name="pcat" class="form-control" placeholder="add product category..."  min=1 max=6 value="<?php echo($product_cat) ?>" required>
                  </div>
                   <div class="form-group">
                    <label>product Discount</label>
                    <input type="number" name="pdiscount" class="form-control" placeholder="put the discount in product if you want..." value="<?php echo($discount) ?>" min=0 max = 100>
                  </div>
                  <input type="submit" class="btn btn-default" value="Update" name="update">
                </form>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <footer id="footer">
      <p>&copy; Made by Deepak Gupta</p>
    </footer>
    <!-- Modals -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
}
else{
  echo "<script >
      alert('you need to login first');
      window.open('login.php', '_self');</script>";
}
?>