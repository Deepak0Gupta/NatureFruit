<?php 
include("db.php");
session_start();
	error_reporting(E_ERROR | E_PARSE);
$username = $_SESSION['username'];
if (!empty($username)) {
	echo "<script >
			alert('you alredy loged in');
			window.open('index.php', '_self');</script>";
}
 ?>
<!DOCTYPE html>
<html>
<body>
		<?php
		include("header.php");
	?>
<center>
<div class="login">
	<h4>forgot password</h4><br>
	<form  method="post">
			<div class="alert alert-danger" id="error_message" style="display: none;">
  	<strong>Danger!</strong> Indicates .
	</div>
	<div class="alert alert-success" id="success_message" style="display: none;">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
		<div class="input-group">
			<input autocomplete="off" type="text" name="u" value="<?php if(isset($_POST['u'])){echo $_POST['u'];} ?>" minlength="8"  required>
			<span id="required">Username</span>
		</div>
		<div class="input-group">
			<input autocomplete="off" type="email" name="e" value="<?php if(isset($_POST['e'])){echo $_POST['e'];} ?>" minlength="8"  required>
			<span id="required">email</span>
		</div>
		<div class="input-group">
			<input  type="password" name="np"  minlength="8" required>
			<span id="required"01>New Password</span>
		</div>
		<div class="input-group">
			<input  type="password" name="cnp"  minlength="8" required>
			<span id="required"01>Confirm New Password</span>
		</div>
		<div class="input-group">
			<input type="submit" value="submit" name="submit">
		</div>
	</form>
	<a href="singup.php">Dont have a Account <span style="color:red ; ">&nbsp&nbsp Register</span></a>
	<a href="login.php" style="text-align: center;"><span style="color:blue;">Login page</span></a>
</div>
</center>
<?php 
if(isset($_POST['submit'])){
	$u =	mysqli_real_escape_string($con,$_POST['u']);
	$email = mysqli_real_escape_string($con,$_POST['e']);
	$np = mysqli_real_escape_string($con,$_POST['np']);
	$cnp = mysqli_real_escape_string($con,$_POST['cnp']);
	if ($np != $cnp) {
		echo "<script>
			document.getElementById('error_message').innerHTML = '<strong>Password does not match</strong>';
			error_message.style.display = 'block';
			 </script>";
	}else{
		$cnp = md5($cnp);
	}
	$query = mysqli_query($con,"SELECT email FROM accounts WHERE email='{$email}' and username ='{$u}' limit 1") or die("something went wrong");
	if (mysqli_num_rows($query) == 1 ) {
		$update = mysqli_query($con,"update accounts set password = '$cnp' where email = '$email' limit 2") or die(mysqli_error($con));
		if ($update) {
			echo "<script>
            	error_message.style.display = 'none';
            	document.getElementById('success_message').innerHTML = '<strong>Password updated successfully</strong>';
			 	success_message.style.display = 'block';</script>";
		}
	}else{
		echo "<script>
			document.getElementById('error_message').innerHTML = '<strong>username or email is not registered</strong>';
			error_message.style.display = 'block';
			 </script>";
	}
}
 ?>
<?php
include("footer.php");
?>
</body>
</html>
