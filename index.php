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

    <title>Peel Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/styles.css">

  </head>

  <body class="landing">

    
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
            <li class="active"><a href="#">HOME</a></li>
            <li><a href="features.html">FEATURES</a></li>
            <li><a href=<?php if(LoggedIn()) { ?>"portal.php"<?php } else { ?>"sign_in.php"<?php } ?>>PORTAL</a></li>
            <li><a href="#">ABOUT US</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <section class="content">
      <div class="container">
         
          <div class="row">
            <div class="col-md-3 col-md-push-3 center-block">
                <a href="register.php" class="btn btn-default btn-lg">Get started</a>
            </div>
            <div class="col-md-3 col-md-push-3 center-block">
               <a href="features.html#apis" class="btn btn-default btn-lg">Use APIs</a>
            </div>
          
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
