<?php
  require("db.php");
if (isset($_SESSION['admin'])) {
$uname = $_SESSION['admin'];
if(isset($_GET["id"])){
    $id = $_GET["id"];
    }
     $deletequery = mysqli_query($con,"DELETE FROM products WHERE product_id = '$id'") or die(mysqli_error($con));
     if($deletequery){
     echo "<script>
    alert('product successfully deleted');
    window.open('products.php',, '_self');</script>";
     }
?>
<?php 
}
else{
  echo "<script >
     
      window.open('login.php', '_self');</script>";
}
?>