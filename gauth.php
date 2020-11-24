<?php
    require("db.php");
?>
<?php
require_once('settings.php');
require_once('google-login-api.php');
// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>nature.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
</style>
</head>
<body>
<?php
include("header.php");
?>
<center>
<div id="information-container">
	<div class="information">
		<label>Name</label><span>&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $user_info['name'] ?></span>
	</div>
	<div class="information">
		<label>ID</label><span><?= $user_info['id'] ?></span>
	</div>
	<div class="information">
		<label>Email</label><span><?= $user_info['email'] ?></span>
	</div>
	<div class="information">
		<label>Email Verified</label><span>&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $user_info['verified_email'] == true ? 'Yes' : 'No' ?></span>
	</div>
	<div class="information">
		<label>Picture</label>&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="<?= $user_info['picture'] ?>" />
	</div>
	<?php
			$_SESSION['username'] = $user_info['name'];
      ?>
</div>
</center>
<?php
$u = $user_info['name'];
$e = $user_info['email'] ;
$p = $user_info['id'];
$p = md5($p);
$vkey = $user_info['id'];
$verified = 1;
// if alredy exist
	$resultset= $mysqli->query("select username, email  from accounts where username = '$u' and password = '$p' ")or die($mysqli->error);
	if ($resultset->num_rows == 0) {
		# process login
	$insert = $mysqli->query("insert into accounts(username,password,email,vkey,verified)values('$u','$p','$e','$vkey', '$verified') ");
	if ($insert) {
	}else {
	echo $mysqli->error;
	}
}elseif ($resultset->num_rows >= 1) {
	echo "<script >
			alert('welcome again $u');
				 	setTimeout(function(){
        			location.replace('http://naturefruit.epizy.com/index.php')
   					},1000);
   					</script >";
}
include("footer.php");
?>
</body>
</html>