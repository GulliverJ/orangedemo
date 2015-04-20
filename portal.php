<?php
 require( 'user_manager.php' );
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/styles.css">

    <style>
    th, td {
         border-top: 1px solid gray;
         padding-left: 5px;
         padding-right: 5px;
    }
    </style>
    <title>Orange Sensors</title>
</head>
<body>
    
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <?php
                if(LoggedIn()) { ?>
                    <p class='navbar-text' style="color:#ffffff; display: inline; float: left">Logged in as <?php echo GetUserName(); ?>.<a href="logout.php" class="navbar-text" style="padding-left: 8px; float: none">Log out</a></p>
                    <?php
                }
            ?>
          <button type="button" class="navbar-toggle collapsed" style="float: right" data-toggle="collapse" data-target="#main-menu">
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
            <li><a href="api.php">APIs</a></li>
            <li class="active"><?php if(LoggedIn()) { ?><a href="portal.php"><?php } else { ?><a href="sign_in.php"><?php } ?>PORTAL</a></li>
            <li><a href="http://students.cs.ucl.ac.uk/2014/group10">ABOUT</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<section class="content">
    <div class="container" style="height: 100%">
</ul>
<h1> Management Portal </h1><br>

<?php

if(LoggedIn()) { ?>

<div class='row'>
    <div class='col-md-3'></div>
    <div class='col-md-6'>
        <a href="addsensors.php" class = 'btn btn-block btn-success'>Register New Sensors!</a><br>
    </div>
    <div class='col-md-3'></div>
</div>

<?php 

    // User info will be loaded into session, including their name and operator ID.
    $opid = $_SESSION['operator_id'];

    // Connection info
    $host = "localhost";
    $user = "sensors";
    $pwd = "sensors";
    $db = "orangesystem";
    
    // Connect to database
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        die(var_dump($e));
    }

    // Identifier
    
    $sql_select = "SELECT identifier FROM identifiers WHERE operator_id = {$opid};";
    $stmt = $conn->query($sql_select);
    $results = $stmt->fetchColumn(0);
    echo "<div class='jumbotron'><h3>Your Unique Identifier: " . $results . "</h3></div>";
    
    // Sensors table
    echo "<br><h2>My Sensors</h2>";
    $sql_select = "SELECT sensor_id, global_id, application, measures, active FROM sensors WHERE operator_id = {$opid};";
    $stmt = $conn->query($sql_select);
    $results = $stmt->fetchAll(); 
    if(count($results) > 0) {
        echo "<table class='table'>";
        echo "<tr><th>Sensor ID</th>";
        echo "<th>Global ID</th>";
        echo "<th>Application Label</th>";
        echo "<th>Measures</th></tr>";
        foreach($results as $row) {
            echo "<tr><td>".$row['sensor_id']."</td>";
            echo "<td>".$row['global_id']."</td>";
            echo "<td>".$row['application']."</td>";
            echo "<td>".$row['measures']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h4>No sensors to show</h4>";
    }
} else { ?>
<div class="jumbotron">
<h3>You are not logged in. Click <a href="index.php">here</a> to log in.</h3>
</div>
<?php
}?>

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
