

<?php
    require("db.php");
require_once('settings.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>nature.com/login</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
	#required::after{
		content: '*';
	 	color: red;
	}
</style>
</head>
<body>
	<?php
		include("header.php");
	?>
<!---============================side menu==================------>
<!--======================================login=================-->
<center>
<div class="login">
	<h2>Sign In</h2>
	<form action="" method="post">
			<div class="alert alert-danger" id="error_message" style="display: none;">
  	<strong>Danger!</strong> Indicates .
	</div>
	<div class="alert alert-success" id="success_message" style="display: none;">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
		<div class="input-group">
			<input autocomplete="off" type="text" name="u" required="required" minlength="8"  required>
			<span id="required">Username</span>
		</div>
		<div class="input-group">
			<input  type="password" name="p" required="required" minlength="8" required >
			<span id="required"01>Password</span>
		</div>
		<div class="input-group">
			<input type="submit" value="Login" name="submit">
		</div>
		<div class="input-group">
		<a id="login-button" href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>"><img src="img/login-with-google.png" style="border: none;box-shadow: none;cursor: pointer;font-weight: 600;"></a>
		</div>
	</form>
	<a href="singup.php">Dont have a Account <span style="color:red ; ">&nbsp&nbsp Register</span></a>
	<a href="Forgotpassword.php" style="text-align: center;"><span style="color:blue;">Forgot Password</span></a>
</div>
</center>
<!--===============================footer------------------------------------->
<?php
include("footer.php");
?>
<script type="text/javascript">
	function openmenu()
	{
		document.getElementById("side-menu").style.display="block";
		document.getElementById("menu-btn").style.display="none";
		document.getElementById("close-btn").style.display="block";
	}
	function closemenu()
	{
		document.getElementById("side-menu").style.display="none";
		document.getElementById("menu-btn").style.display="block";
		document.getElementById("close-btn").style.display="none";
	}
</script>
<?php
$error = NULL;
$_SESSION['username'] = NULL;
if(isset($_POST['submit'])){
	// get form data
	$u = $mysqli->real_escape_string($_POST['u']);
	$p = $mysqli->real_escape_string($_POST['p']);
	$p = md5($p);
	// query
	$resultset= $mysqli->query("select * from accounts where username = '$u' and password = '$p' limit 1");
	if ($resultset->num_rows == 1) {
		# process login
		$row = $resultset->fetch_assoc();
		$verified = $row['verified'];
		$email = $row['email'];
		$date = $row['createdate'];
		$date = strtotime($date);
		$date = date('M d Y',$date);
		if ($verified == 1) {
			# contineu
			$_SESSION['username'] = $u;
			    echo "<script>
            	error_message.style.display = 'none';
            	document.getElementById('success_message').innerHTML = '<strong>You logedin</strong>';
			 	success_message.style.display = 'block';
			 	setTimeout(function(){
        			location.replace('http://naturefruit.epizy.com/index.php')
   					},500);
            	</script>";
            	header("Location: wellcome.php");
		}else{
			echo "<script>
			                document.getElementById('error_message').innerHTML = '<strong> this account is not been verified and email sent to you $email  on $date</strong>';
			                error_message.style.display = 'block';
			            </script>";
			$error = "";
		}
	}else{
		echo "<script>
			                document.getElementById('error_message').innerHTML = '<strong>incorrect username</strong>';
			                error_message.style.display = 'block';
			            </script>";
	}
}
echo "$error";
?>
</body>
</html>