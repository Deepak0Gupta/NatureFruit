<?php
    require("db.php");
    error_reporting(E_ERROR | E_PARSE);
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
<!--======================================singup================-->
<center>
<div class="login">
	<h2>Sign Up</h2>
	<form name="registration" action="" method="post">
		<div class="alert alert-danger" id="error_message" style="display: none;">
  	<strong>Danger!</strong> Indicates .
	</div>
	<div class="alert alert-success" id="success_message" style="display: none;">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
		<div class="input-group">
			<input autocomplete="off" type="text" name="u"  maxlength="16" minlength="8" required="required" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>">
			<span id="required">username</span></span>
		</div>
		<div class="input-group">
			<input autocomplete="off" type="Email" name="e" required="required" maxlength="25" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
			<span id="required">Email</span>
		</div>
		<div class="input-group">
			<input type="password" name="p" required="required" maxlength="16" minlength="8" required>
			<span id="required">Password</span>
		</div>
		<div class="input-group">
			<input type="submit" name="submit" value="Register">
		</div>
		<div class="input-group">
					<a id="login-button" href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>"><img src="img/login-with-google.png" style="border: none;box-shadow: none;cursor: pointer;font-weight: 600;"></a>
		</div>
		<strong><a href="login.php" style="color:blue ;margin-left: 43px; ">Already have a Account </a></strong>
	</form>
</div>
</center>
<?php
include("footer.php");
?>
<!--===============================footer------------------------------------->
<?php
$error = NULL;
if (isset($_POST['submit'])) {
	//get the form
	$u = $_POST['u'];
	$p = $_POST['p'];
	$e = $_POST['e'];
	$sqluser = $mysqli->query("SELECT uid FROM accounts WHERE username='$u'");
	$sqlusere = $mysqli->query("SELECT uid FROM accounts WHERE email='$e'");
	if(preg_match('/^\w{5,}$/', $e)) {
                  	echo"<script> document.getElementById('error_message').innerHTML = 'username should not contaion any special charecter';
			 error_message.style.display = 'block';</script>";
	}elseif ($sqluser->num_rows > 0) {
				                 echo "<script>
			                document.getElementById('error_message').innerHTML = '<strong> username already exist</strong>';
			                error_message.style.display = 'block';
			            </script>";
			                    }
	elseif ($sqlusere->num_rows > 0) {
				                 echo "<script>
			                document.getElementById('error_message').innerHTML = '<strong> email already exist</strong>';
			                error_message.style.display = 'block';
			            </script>";
			                    }
	else
	{
		//form is velid
		require("db.php");
		//connection
		//$mysqli = new mysqli('localhost','root','','project');
		//sanetuze
		$u = $mysqli->real_escape_string($u);
		$p = $mysqli->real_escape_string($p);
		$e = $mysqli->real_escape_string($e);
		//generate vkey
		$vkey = md5(time().$u);
		//insert into database
		$p = md5($p);
		$insert = $mysqli->query("insert into accounts(username,password,email,vkey)values('$u','$p','$e','$vkey') ");
		if ($insert) {
			//email
			$to = $e;
			$subject = "Email Verification";
			$message = "<a href='http://localhost/project-php/verify.php?vkey=$vkey'>Register account</a>";
			$headers = "From: dg82680100@gmail.com";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to, $subject, $message,$headers);
			    echo "<script>
            	error_message.style.display = 'none';
            	document.getElementById('success_message').innerHTML = '<strong>thank you for registretion Plese verify your email</strong>';
			 	success_message.style.display = 'block';
			 	setTimeout(function(){
        			location.replace('login.php')
   					},1500);
            	</script>";
		}else{
			echo $mysqli->error;
		}
	}
}
echo "$error";
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
</body>
</html>