<?php 
include "db.php";
session_start();
 error_reporting(E_ERROR | E_PARSE);
$username = $_SESSION['username'];
if (empty($username)) {
  echo "<script >
      alert('you need to login first');
      window.open('login.php', '_self');</script>";
}
include "header.php";
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fullpage.css">
<style>
.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 15px;
  padding: 10px;
  margin: 10px 0;
}
.darker {
  border-color: #ccc;
  background-color: #ddd;
  margin-left: 50%;
}
.container1::after {
  content: "";
  clear: both;
  display: table;
}
.container1 img {
  float: left;
  max-width: 50px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}
.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}
.time-right {
  float: right;
  color: #aaa;
}
.time-left {
  float: left;
  color: #999;
}
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  bottom: 0;
  margin-top: 200px;
  background-color: #ddd;
  padding: 10px 0 0 10px;
  font-size: 20px;
}
.square {
  height: auto;
  width: 810px;
  padding: 8px;
  background-color: #fff;
  border: 2px solid #dedede;
}
#trash{
  position: fixed;
  z-index: 2;
}
#message{
  float: left;
}
</style>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<center>
<body>
<span id="ref">
<div class="square">
<center><h2>Chat Messages</h2></center>
<span id="ref"><span id="ref">
<br>
</span></span>
<form action="" method="post">
<button id="trash" name="trash" class="btn btn-primary" style="margin-left: 300px;" onclick="delete_message()">
  <i class="fa fa-trash-o fa-lg"></i> Trash
</button>
</form>
<br/>
  <?php
    $query="select * from chats where username='$username'  ORDER by date ";
    $res=mysqli_query($conn,$query);
    while($data=mysqli_fetch_array($res)){
      $user=$data['user'];
      $chatbot=$data['chatbot'];
      $date=$data['date'];
  ?>
  <div class="container1" style="margin-right: 400px;">
    <img src="img/user.jpg" alt="Avatar" style="width:100%;">
    <p id="message"><?php echo $user;?></p>
    <span class="time-right"><?php echo $date;?></span>
  </div>
  <div class="container1 darker" >
    <img src="img/chatbot.png" alt="Avatar" class="right" style="width:100%;">
    <p ><?php echo $chatbot;?></p>
    <span class="time-left"><?php echo $date;?></span>
  </div>
<?php } ?>
<div class="sticky">
  <div class="row">
     <div class="col-md-12">
       <div class="input-group mb-3">
          <input type="text" class="form-control" id="msg" >
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="send()">Send</button>
            </div>
        </div>
   </div>
  </div>
</div>
</div>
</span>
<br/>
<?php 
if (isset($_POST['trash'])) {
  $query=mysqli_query($conn,"DELETE FROM chats where username = '$username' ");
  if ($query) {
     header("Refresh:0");
  }
}
?>
<script type="text/javascript">
  function send(){
    var text=$('#msg').val().toLowerCase();
     $.ajax({
                type:"post",
                url:"mysearch.php",
                data:{text:text},
                success:function(data){
                    //alert(data);
                    $('#ref').load(' #ref');
                }
      });
  }
</script>
<script type="text/javascript">
        $(document).ready(function () {
            //Disable full page
            $("body").on("contextmenu",function(e){
                alert("right click functionality is disabled for this page.");
                return false;
            });        
        });
     </script>
</body>
<center>
<?php
include "footer.php";
?>
</html>