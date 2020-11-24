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
            <li><a href="Recementaion.php">Recementaion</a></li>
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
               <a href="Recementaion.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Recementaion</a>
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
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Products</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Posts...">
                      </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discription</th>
                        <th>Image</th>
                        <th>active</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Discount</th>
                      </tr>
                      <?php
                      $run = mysqli_query($con,"SELECT * FROM products WHERE 1");
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
                            ?>



                      
                      <tr>
                        <td><?php echo "$name"; ?></td>
                        <td><?php echo "$dbprice"; ?></td>
                        <td><?php echo "$desc"; ?></td>
                        <td><?php echo "$image"; ?></td>
                        <td><?php echo "$active"; ?></td>
                        <td><?php echo "$product_quantity"; ?></td>
                        <td><?php echo "$product_cat"; ?></td>
                        <td><?php echo "$discount"; ?></td>
                        
                        <td><a class="btn btn-default" href="edit.php?id=<?php echo($id) ?>">Edit</a> <a class="btn btn-danger" href="delete.php?id=<?php echo($id) ?>">Delete</a></td>
                      </tr>
                            <?php
                          }}
                      ?>
                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy; Made By Deepak Gupta</p>
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