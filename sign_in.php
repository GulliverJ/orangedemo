<?php
 require( 'user_manager.php' );
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Index</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/styles.css">

  </head>

  <body>

    
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-menu">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">HOME</a></li>
            <li><a href="features.html">FEATURES</a></li>
            <li class="active"><a href="#">SIGN IN</a></li>
             <li><a href="#">ABOUT US</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <section class="content">
    	<div class="container">
    		<?php
    		if(LoggedIn()) { ?>
    		<h4>Logged in as <?php echo GetUserName(); ?>.</h4>
    		<a href="logout.php">Log out</a> :C
    		<a href="portal.php">Manage my sensors</a><?php
    	} else {
    		?>
    	</div>
    </section>

    <section class="content">
      <div class="container">
         
          <div class="row">
            <div class="col-md-12"> 
				<a href="register.php">Click here to Sign up!</a>
				<h3>Log in!</h3>
				<form name="login" method="post" action="user_manager.php" id="login" novalidate>
					<div class="form-group">
						<label for="username">Username or Company Name:</label>
						<input name="username" id="username" class="form-control" type="text" placeholder="Username" title="Enter your username">
					</div>
					<div class="form-group">
						<label for="password">Password Name:</label>
						<input name="password" id="password" class="form-control" type="password" placeholder="Password" title="Enter your password">
					</div>
					<button class="btn btn-primary btn-lg custom-width" type="submit" name="login">Log in</button>
				</form>
            </div>  
          </div>
      </div>  
    </section>  
	<?php
	}
	?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
