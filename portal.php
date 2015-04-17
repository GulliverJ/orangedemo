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
    <title>Portal</title>
</head>
<body>
    

<nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <?php
                if(LoggedIn()) { ?>
                    <p class='navbar-title'>Logged in as <?php echo GetUserName(); ?>.</p>
                    <a href="logout.php">Log out</a><?php
                }
                ?>
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
            <li><a href="#">FAQ</a></li>
            <li><a href="#">CONTACT US</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>



---

<h1>Portal, for registered users only</h1>

<p>This page should display the following:</p>
<ul>
  <li>A list of their sensors, whether they're active or not</li>
  <li>A link to register new sensors</li>
</ul>
<a href="addsensors.php">Register New Sensors!</a><br>
<a href="index.php">Home</a>

<?php

if(LoggedIn()) {

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

    // Sensors table
    echo "<br><h2>My Sensors (rough, ugly version! Use source code for reference) </h2>";
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
        echo "<h3>Empty set</h3>";
    }
} else { ?>
<h3>You are not logged in. Click <a href="index.php">here</a> to log in.</h3>
<?php
}?>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
