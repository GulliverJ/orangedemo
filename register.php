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

    <title>Orange Sensors</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/styles.css">

  </head>

  <body>

    
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <img src="bootstrap/css/images/title.png">
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
            <li><a href="index.php">BROWSE</a></li>
            <li><a href="api.html">APIs</a></li>
            <li><?php if(LoggedIn()) { ?><a href="portal.php"><?php } else { ?><a href="sign_in.php"><?php } ?>PORTAL</a></li>
            <li><a href="http://students.cs.ucl.ac.uk/2014/group10">ABOUT</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <section class="content">
      <div class="container">
          <h1>Register</h1>
            <form name="signup" method="post" action="signup.php" id="signup-form" novalidate>
              <div class="form-group">  
               <label for="username">Username (e.g. Company name):</label>
               <input name="company_name" id="company_name" class="form-control" type="text" placeholder="Choose a username" title="Enter your username">
            </div> 
             <div class="form-group"> 
               <label for="contact">Contact Name:</label>
               <input name="contact_name" id="contact_name" class="form-control" type="text" placeholder="Enter a contact name" title="Enter your username">
             </div> 
             <div class="form-group">
               <label for="pass">Password:</label>
               <input name="password" id="password" class="form-control" type="password" placeholder="Choose a password" title="Enter your password">
             </div> 
             <div class="form-group">
               <label for="email">Email Address:</label>
               <input name="email" id="email" class="form-control" type="email" placeholder="Enter your email address" title="Enter your email address">
              <br> <button class="btn btn-primary btn-lg custom-width" type="submit" name="submit">Submit</button>
            </div>
          </form>
      </div>  
    </section> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


		