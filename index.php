<?php
  require('user_manager.php');
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
    <link rel="stylesheet" type="text/css" href="bootstrap/css/landing.css">
  </head>

  <body class="landing">
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <img src="bootstrap/css/images/title.png" style="margin-left: auto; margin-right: auto;">
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
            <li class="active"><a href="#">BROWSE</a></li>
            <li><a href="api.html">APIs</a></li>
            <li><?php if(LoggedIn()) { ?><a href="portal.php"><?php } else { ?><a href="sign_in.php"><?php } ?>PORTAL</a></li>
            <li><a href="http://students.cs.ucl.ac.uk/2014/group10">ABOUT</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container search">
      <h1 style="font-weight: lighter; color: #1b1b1b;">Real-time readings from across the city</h1>
      <input type="text" class="form-control mainsearch" id="mainsearch" placeholder="Search for sensors"></input>
      <button class="btn btn-default btn-lg" style="height: 48px; max-width: 200px; margin-bottom: 70px;">Go</button>
      <p style="max-width: 480px; margin-left: auto; margin-right: auto; padding-bottom: 8px; margin-top: 72px">Orange Labs presents a new way to view the city, offering public access to hundreds of sensors providing real-time data.</p>
      <a href="http://students.cs.ucl.ac.uk/2014/group10" style="color: #fca">Find out more</a>
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-5" style="padding-left: 64px; padding-right: 64px; background-color: #1b1b1b">
            <h2 style="color: #f60; margin-top: 8px">An Open Network</h2>
            <p style="min-height: 72px; margin-top: 32px">Sign up, initialise a sensor, then simply switch it on to start sharing data. It's that easy!</p>
            <a href="register.php" class="btn btn-lg features-button">Sign Up</a>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-5" style="padding-left: 64px; padding-right: 64px; background-color: #1b1b1b">
            <h2 style="color: #f60; margin-top: 8px;">Public Data</h2>
            <p style="min-height: 72px; margin-top: 32px">Access a wealth of public sensor data using one of our APIs. Run analytics and integrate the data with your applications.</p>
            <a href="apis.html" class="btn btn-lg features-button">Data APIs</a>
          </div>
          
        </div>
      </div> 
    </div> 
    <!--
    <div class="container-fluid footer">
      <p style="float: right">This project is proudly presented in partnership with</p>
    </div>-->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
