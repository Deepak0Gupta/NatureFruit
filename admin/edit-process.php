    <?php
    require("db.php");
    if (isset($_SESSION['admin'])) {
$uname = $_SESSION['admin'];
if(isset($_GET["id"])){
    $id = $_GET["id"];
  }
    if(isset($_POST['update']) ){
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
      $query = "UPDATE products set product_cat='$pcat',product_title='$pname',product_price='$pprice',product_desc='$pdesc',product_image='$pimage',active='$pactive',product_quantity='$pqty',product_discount='$pdiscount'  WHERE product_id= '$id' " or  die(mysqli_error($con));
      $fire =  mysqli_query($con,$query)or  die(mysqli_error($con));
      if ($fire) {
       echo "<script>
    alert('product successfully updated');
    window.open('products.php', '_self');</script>";
      }else{
        echo "fail";
      }
  }
     ?>
     <?php 
}
else{
  echo "<script >
      alert('you need to login first');
      window.open('login.php', '_self');</script>";
}
?>