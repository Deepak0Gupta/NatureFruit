<?php
    require("db.php");
if (isset($_GET['vkey'])) {
	# process varification
	$vkey = $_GET['vkey'];
	//connection
	$resultset = $mysqli->query("select verified,vkey from accounts where verified=0 and vkey = '$vkey' limit 1");
	if ($resultset->num_rows == 1) {
		# validate email
		$update = $mysqli->query("update accounts set verified = 1 where vkey = '$vkey' limit 1");
		if ($update) {
			echo "<script>
				alert('your account has been verified you may now login');
				window.open('index.php', '_self');
				</script>";
		}else{
			echo $mysqli->error;
		}
	}else{
		echo "<script>
				alert('This account is already verified');
				setTimeout(function(){
        			location.replace('login.php')
   					},500);
				</script>";
	}
}else{
	die("somethig went wrong");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	</center>
</body>
</html>