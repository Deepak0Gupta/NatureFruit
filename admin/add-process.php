       <?php
 require("db.php");
 if (isset($_SESSION['admin'])) {
   $ordercount = mysqli_query($con,"SELECT * FROM `orders` WHERE 1") or die(mysqli_error($con));
$ototal = mysqli_num_rows($ordercount);
$uname = $_SESSION['admin'];
    if(isset($_POST['Add']) ){
  $pname = $_POST['pname'];
   $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdesc'];
     $pimage = $_POST['pimage'];
      $pactive = $_POST['pactive'];
      if ($pactive == 'on') {
        $pactive=1;
      }else{
        $pactive=0;
      }
       $pqty = $_POST['pqty'];
        $pcat = $_POST['pcat'];
         $pdiscount = $_POST['pdiscount'];
      $query = "insert into  products(product_cat, product_title, product_price, product_desc, product_image, active, product_quantity, product_discount) values('$pcat','$pname','$pprice','$pdesc','$pimage','$pactive','$pqty','$pdiscount') " ;
      $fire =  mysqli_query($con,$query)or  die(mysqli_error($con));
      if ($fire) {
       echo "<script>
    alert('product successfully added');
    window.open('add_new_product.php', '_self');</script>";
      }else{
        echo "fail";
      }
  }
     ?>
     <?php 
}
else{
  echo "<script >
      
      window.open('login.php', '_self');</script>";
}
?>