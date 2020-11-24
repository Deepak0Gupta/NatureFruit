<?php
  
  require("db.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form  action="" class="well" method="post">
              <center>
                <div class="alert alert-danger" id="error_message" style="display: none;">
    <strong>Danger!</strong> Indicates .
  </div>
  <div class="alert alert-success" id="success_message" style="display: none;">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="u" class="form-control" placeholder="Enter Username" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input name="p" type="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" name="login" class="btn btn-default btn-block">Login</button>
                  </center>
              </form>
          </div>
        </div>
      </div>
    </section>
<?php
if (isset($_POST['login'])) {
  $u = mysqli_real_escape_string($con,$_POST['u']);
  $p = mysqli_real_escape_string($con,$_POST['p']);
  $admindata = mysqli_query($con,"SELECT * FROM admin_login where username='$u' and password='$p'") or die(mysqli_error($con));
  if (mysqli_num_rows($admindata)==1) {
       $_SESSION['admin'] = $u;
         echo "<script>
              error_message.style.display = 'none';
              document.getElementById('success_message').innerHTML = '<strong>Wellcome Admin</strong>';
        success_message.style.display = 'block';
          setTimeout(function(){
            window.open('index.php', '_self');
            },500);
        
              </script>";
              
   }else{
      echo "<script>
                      document.getElementById('error_message').innerHTML = '<strong>Access Denied</strong>';
                      error_message.style.display = 'block';
                  </script>";

   }


  # code...
}
?>
    <footer id="footer">
      <p> &copy;Made by Deepak Gupta</p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
