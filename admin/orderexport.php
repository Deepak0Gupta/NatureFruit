 <?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
       $connect =  mysqli_connect("sql300.epizy.com","epiz_24798586","0XGHAVhv2yJKx","epiz_24798586_nature") or die(mysqli_error($con));
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('username', 'product_name', 'Total price', 'Address' , 'Order Date' , 'city'));  
      $query = "SELECT username , product_name , total_price , address1 , order_date , city from `orders` ORDER BY id ";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?> 