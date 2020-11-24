<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/



$con = mysqli_connect("localhost","root","","project") or die(mysqli_error($con));
// Check connection
$mysqli = new mysqli('localhost','root','','project')or die(mysqli_error($con));


 $db = new mysqli("localhost", "root", "", "project")or die(mysqli_error($con));
 $conn = new mysqli("localhost", "root", "", "project")or die(mysqli_error($con));*/
 $con = mysqli_connect("sql300.epizy.com","epiz_24798586","0XGHAVhv2yJKx","epiz_24798586_nature") or die(mysqli_error($con));
// Check connection
$mysqli = new mysqli('sql300.epizy.com','epiz_24798586','0XGHAVhv2yJKx','epiz_24798586_nature')or die(mysqli_error($con));


 $db = new mysqli("sql300.epizy.com", "epiz_24798586", "0XGHAVhv2yJKx", "epiz_24798586_nature")or die(mysqli_error($con));
 $conn = new mysqli("sql300.epizy.com", "epiz_24798586", "0XGHAVhv2yJKx", "epiz_24798586_nature")or die(mysqli_error($con));
?>