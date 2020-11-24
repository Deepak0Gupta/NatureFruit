 <?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
       $connect =  mysqli_connect("sql300.epizy.com","epiz_24798586","0XGHAVhv2yJKx","epiz_24798586_nature") or die(mysqli_error($con));
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('UID', 'Name', 'Email', 'phone_number', 'date of birth' , 'verified'));  
      $query = "SELECT uid , username , email , phone_number , date_of_birth ,verified  from accounts ORDER BY uid DESC";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>