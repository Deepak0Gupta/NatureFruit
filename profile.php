<?php
    require("db.php");
include("header.php");
if (isset($_SESSION['username'] )) {
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#information-container {
	width: 400px;
	margin: 50px auto;
	padding: 20px;
	border: 1px solid #cccccc;
}
.information {
	margin: 0 0 30px 0;
}
.information label {
	display: inline-block;
	vertical-align: left;
	width: 150px;
	font-weight: 700;
	text-align: left;
}
.information span {
	display: inline-block;
	vertical-align: right;
}
.information img {
	display: inline-block;
	vertical-align: right;
	width: 100px;
}
label{
	float: left;
}
#ps{
	position: relative;
	padding-left: 100px;
	bottom: 30px;
}
#address{
	height: 75px;
}
@media only screen and (max-width: 360px){
#information-container{
	width: 100%;
}	
}
</style>
</head>
<body>
	<!--  ============================ getting the data from the database=======================-->
	<?php
$userid = mysqli_query($con,"SELECT * FROM accounts WHERE username='{$username}' limit 1");
if ($userid) {
	while ($row = mysqli_fetch_array($userid)){
		$username  = $row['username'];
		$email  = $row['email'];
		$createdate  = $row['createdate'];
		$pn  = $row['phone_number'];
		$dob  = $row['date_of_birth'];
	}
	?>
<center>
	<form name="validation" action="" method="POST">
<div id="information-container">
	<div class="information">
		<label>Username :</label><span ><?php  echo "$username"; ?></span>
	</div>
	<div class="information">
		<label>Email :</label><span ><?php  echo "$email"; ?></span>
	</div>
	<div class="information">
		<label>Phone Number :</label><span > <?php if ($pn != 0) {
			?><span><?php  echo "$pn"; ?></span> 
			<?php
		} else{ ?>  <input type="Number" name="pn" minlength="7777777777" maxlength="9999999999" value="<?php  echo "$pn"; ?>"  required > <?php } ?> </span>
	</div>
	<div class="information">
		<label>Date of Birth :</label><span >   <?php if ($dob != "") {
			?><span><?php  echo "$dob";?></span> 
			<?php
		} else{ ?> <input type="Date" name="dob" value="<?php  echo "$dob"; ?>" required> <?php } ?>  </span>
	</div>
	<div class="information">
		<label>My Orders :</label><span><a href="order-history.php">My Orders</a></span>
	</div>
	<div class="information">
		<label>Account Create Date :</label><span><?php  echo "$createdate"; ?></span>
	</div>
	<center> <?php if ($pn == 0) {
			?> <input type="submit" name="submit" value="Update" class='btn btn-warning'></center> 
			<?php
		} else{ ?>  <?php } ?>
</div>
</form>
</center>
<?php
	if(isset($_POST['submit'])){
		$pn =	mysqli_real_escape_string($con,$_POST['pn']);
		$dob = mysqli_real_escape_string($con,$_POST['dob']);
		$dob1=substr("$dob",5);
		if(preg_match("/^[0-9]{10}$/", $pn)) {
  		// $phone is valid
					$update = mysqli_query($con,"update accounts set phone_number = '$pn' , date_of_birth='$dob' ,birthday_month='$dob1' where username='$username' limit 1") or die(mysqli_error($con));
					if ($update) {
						echo "<script >
								window.open('profile.php', '_self');</script>";
					}
		}else{
			?>
			<script type="text/javascript">alert("please enter a valid phone number");</script>
			<?php 
		}
	}
		?>
<?php
}
}else{
echo "<script >
			alert('you need to login first');
			window.open('login.php', '_self');</script>";
}
include("footer.php");
?>
</body>
</html>
