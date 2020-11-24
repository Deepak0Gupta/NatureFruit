<?php
//fetch.php
 require("db.php");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM `accounts`
  WHERE verified LIKE '%".$search."%'
    OR username LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM `accounts` ORDER BY uid
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
     <th>Uid</th>
     <th>Name</th>
     <th>Email</th>
     <th>Phone number</th>
     <th>date of birth</th>
     <th>veryfied</th>
     <th>join date</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["uid"].'</td>
    <td>'.$row["username"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["phone_number"].'</td>
    <td>'.$row["date_of_birth"].'</td>
    <td>'.$row["verified"].'</td>
    <td>'.$row["createdate"].'</td>
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