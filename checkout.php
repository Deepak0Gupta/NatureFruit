<?php
    require("db.php");
include("header.php");
error_reporting(E_ERROR | E_PARSE);
if (isset($_SESSION['username'] )) {
  if ($_GET['gt'] != 0) {
     $grandtotal = $_GET['gt'];
    $username = $_SESSION['username'];
$userid = mysqli_query($con,"SELECT * FROM accounts WHERE username='{$username}' limit 1");
if ($userid) {
  while ($row = mysqli_fetch_array($userid)){
    $uid = $row['uid'];
    $username  = $row['username'];
    $email  = $row['email'];
    $phone_number = $row['phone_number'];
  }
  ?>
<!-- card view ends -->
<style>
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #fff;
    }
    .form-control
{
    margin-top: 9px;
    border: 1px solid #45CE30 !important;
    border-top-left-radius: 20px !important;
    border-bottom-left-radius: 20px !important;
    border-top-right-radius: 20 !important;
    border-bottom-right-radius: 20 !important;
    box-shadow:none !important; 
}
    </style>    
    </head>
    <body>
        <div class="container-fluid">
           <form class="form-horizontal" action="order.php?gt=<?php echo ($grandtotal) ?>" method="post">
            <div class="card-deck">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Your Details</h4>
                            <div class="form-group">
                              <label class="control-label-static" for="email"><b>Email:</b></label>
                              <div class="col-sm-15">
                                <h2 class="form-control" id="email"><?php echo "$email"; ?></h2>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label-static" for="name"><b>User name:</b></label>
                              <div class="col-sm-15">
                                <h2 class="form-control" id="name"><?php echo "$username"; ?></h2>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label-static" for="Phone"><b>Phone no:</b></label>
                                <div class="col-sm-15">
                                  <input type="Number" class="form-control" name="phone_number" minlength="7777777777" maxlength="9999999999" placeholder="Enter Phone number"  required >
                                </div>
                              </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Shipping Address</h4>
                        <form class="form-horizontal" >
                            <div class="form-group">
                              <label class="control-label-static" for="add1"><b>Address line 1:</b></label>
                              <div class="col-sm-15">
                                <input  type="text" class="form-control" name="add1" minlength="10" placeholder="Enter Address line 1" autocomplete="off" required>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label-static" for="city"><b>Area , City and Postal code:</b></label>
                                <div class="col-sm-15">
                                 <h2 class="form-control" id="name">Kandivali (West),Mumbai - 400067</h2>
                                </div>
                              </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body" style="background-color: #ddd;">
                        <h4 class="card-title">Your Order</h4>
                 <table class="table" >
                            <tbody>
                              <?php 
                                $run = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$uid}'");
                    if(mysqli_num_rows($run) >0){
                      while ($row = mysqli_fetch_array($run)){
                      $pname  = $row['product_title'];
                      $pqty = $row['p_quantity'];
                      ?>
                            <tr>
        <input type="hidden" name="pname" value="<?php echo "$pname"; ?>">   
                 <input type="hidden" name="pqty" value="<?php echo "$pqty"; ?>">  
                                <td ><?php echo "$pname"; ?></td>
                                <td><?php echo "$pqty"; ?></td>
                              </tr>      
                              <?php
                                }}
                              ?>
                              <tr>
                                <td>Sub Total</td>
                                <td>₹ <?php echo "$grandtotal"; ?></td>
                              </tr>
                              <tr>
                                <td>Shipping</td>
                                <td>₹ <?php $Taxes = round($grandtotal*18/100) ; echo "$Taxes";?></td>
                              </tr>
                              <tr style="background-color: #dff0d8;">
                                <td>Total</td>
                                <td>₹ <?php $subtotal = $grandtotal +$Taxes  ; echo "$subtotal";?></td>
                              </tr>
                               <tr>
                                <td><button type="submit" name="place_order" class="btn btn-danger">Place Order</button></td>
                      </tr>
                            </tbody>
                          </table> 
                    </div>
                </div>
</form>
            </div>
            </div>
    </body>
<?php
include("footer.php");
}
  }else{
    echo "<script >window.open('viewcart.php', '_self');</script>";
  }
}else{
  echo "<script >
      alert('you need to login first');
      window.open('login.php', '_self');</script>";
}
?>