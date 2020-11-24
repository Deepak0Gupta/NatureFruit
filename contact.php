<?php
    require("db.php");
?>
<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $sqluser = $db->query("SELECT uid FROM accounts WHERE username='$name' and email = '$email' limit 1");
	if ($sqluser->num_rows > 0) {
		 $insert = $db->query("INSERT INTO `contactus`(`name`, `email`, `massage`) VALUES ('$name','$email','$msg')");
  		if ($insert) {
			//email
			$to = $email;
			$subject = "nature.com";
			$message = "thank you for contacting us <?php $name ?><a href='http://naturefruit.epizy.com/index.php'> naturefruit.com</a>";
			$headers = "From: dg82680100@gmail.com";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to, $subject, $message,$headers);
			echo "<script>
            	alert('thank you for contacting us');
                </script>";
}
	}else{
		echo "<script>
		    $(document).ready(function (){
            $('.submitpro').on('submit', function(e){
                e.preventDefault();
                alert('enter a username or  email not exist')</script>";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="contect.css">
</head>
<body>
	<?php
		include("header.php");
	?>
<!--=============================contact page====================================---->
<center>
	<form action="" method="post">
	<div class="containerc">
		<div class="font side">
			<div class="content">
				<br>
				<br>
				<br>
				<br>
				<br>
				<h1 id="Nature">Nature.com</h1>
			</div>
		</div>
		<div class="back side">
			<div class="content">
				<h1>Contect Me</h1>
				<form>
					<label for="">Your Name:</label>
					<input autocomplete="off" type="text" placeholder="Put Your Username" name="name" required="">
					<label>Email</label>
					<input autocomplete="off" type="Email" placeholder="EXample abc@gmail.com" name="email" required="">
					<label>Your Massage</label>
					<textarea placeholder="The Subject" name="msg" minlength="8" maxlength="50"  required=""></textarea>
					<input type="submit" value="Done"  name="submit">
				</form>
			</div>
		</div>
	</div>
</form>
</center>	
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
</body>
</html>
