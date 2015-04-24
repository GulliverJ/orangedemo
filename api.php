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
            <li class="active"><a href="#">APIs</a></li>
            <li><?php if(LoggedIn()) { ?><a href="portal.php"><?php } else { ?><a href="sign_in.php"><?php } ?>PORTAL</a></li>
            <li><a href="#">ABOUT</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <section>
      <div class="container content-small" style="padding-top: 20px">
          <h1>Orange Sensors APIs</h1>
          <div class="row">
            <div class="col-md-6">
              <h2>Java API</h2>
              <p style="text-align: left">
                The Java API contains a wealth of methods for accessing public data from our database. It's as simple as adding the jarfile to your classpath and instantiating the API.</p>
              <a class="btn btn-primary btn-lg sub-button" href="https://github.com/GulliverJ/OrangeSensorsJavaAPI">Download from Github</a>
              <p style="text-align: left"><br>
                All documentation for the API, along with manuals and sample code, can be found <a href="">here.</a></p>
            </div>
            <div class="col-md-6">
              <h2>Restful API</h2>
              <p>Alternatively, make use of our Restful API built using node.js. It's quick and simple to make HTTP calls 
              and integrate our data within your applications. </p>
               <a class="btn btn-primary btn-lg sub-button" href="https://github.com/vnjk/OrangeSensorsRESTapi">Download from Github</a><br>
               <p>Documentation on this API can be found <a href="">here.</a></p>


            </div>
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


