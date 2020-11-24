<?php
//fetch.php
 require("db.php");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM `orders`
  WHERE order_date LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM `orders` ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if ($result) {
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Customer Name</th>
     <th>product name</th>
     <th>total price</th>
     <th>order date</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["username"].'</td>
    <td>'.$row["product_name"].'</td>
    <td>'.$row["total_price"].'</td>
    <td>'.$row["order_date"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
}else
{
 die(mysqli_error($connect));
}
?>