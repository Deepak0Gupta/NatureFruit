<!DOCTYPE html>
<?php 
session_start();
include("db.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Recipt</title>

    <style type="text/css">
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(img/dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <?php
  if (isset($_SESSION['username'] )) {
     $oid = $_GET['id'];
      $username = $_SESSION['username'];

      $accountsinfo = mysqli_query($con,"SELECT * FROM accounts WHERE username='{$username}' limit 1");
        if ($accountsinfo) {
        while ($row = mysqli_fetch_array($accountsinfo)){
          
          $phone_number  = $row['phone_number'];
          $email = $row['email'];
          }
        } 

        $order = "SELECT * FROM `orders` WHERE id = '$oid'";
            $orquery =  mysqli_query($con,$order)or  die(mysqli_error($con));
            if(mysqli_num_rows($orquery) >0){
          while ($row = mysqli_fetch_array($orquery)){
         
            $product_name = $row['product_name'];
            $total_price = $row['total_price'];
            $address1 = $row['address1'];
          $product_total_price = $row['product_total_price'];
            $city = $row['city'];
            $order_date = $row['order_date'];
          }
        }

        $Taxes = round($product_total_price*18/100);
        $Grand_Total = $product_total_price+$Taxes;
      
  ?>
  <body id="HTMLtoPDF">
    <section >
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.jpg">
      </div>
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div>Nature Fruit</div>
        <div>108 Haritage Perody 2 <br /> Sai Nager</div>
        <div>826801456</div>
        <div><a>Naturefruit@gmail.com</a></div>
      </div>
      <div id="project">
      
        <div><span>CLIENT</span> <?php echo "$username"; ?></div>
        <div><span>ADDRESS</span> <?php echo "$address1"," $city"; ?></div>
        <div><span>EMAIL</span> <a><?php echo "$email"; ?></a></div>
        <div><span>PHONE</span><?php echo "$phone_number"; ?></div>
        
      </div>
    </header>
   <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">PRODUCTS</th>
          <th>    </th>
            <th>    </th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">1</td>
            <td class="desc"><?php echo "$product_name"; ?></td>
         <td>        </td>
            <td class="qty">   </td>
            <td class="total"><?php echo "$product_total_price ₹"; ?></td>
          </tr>
          <tr>
            <td colspan="4">TAX 18%</td>
            <td class="total"><?php echo "$Taxes ₹";  ?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total"><?php echo "$Grand_Total ₹"; ?></td>
          </tr>
        </tbody>
      </table>
     
<a href="#" onclick="HTMLtoPDF()">Download PDF</a>

  <!-- these js files are used for making PDF -->
  <script src="js/jspdf.js"></script>
  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/pdfFromHTML.js"></script>
    </main>
   <?php 
}
   ?>
   </section>
  </body>
</html>