<!DOCTYPE html>
<html>
<body>
<head>
<style>
th, td {
     border-top: 1px solid gray;
     padding-left: 5px;
     padding-right: 5px;
}
</style>
</head>
<h1>Portal, for registered users only</h1>
<p>This page should display the following:</p>
<ul>
  <li>A list of their sensors, whether they're active or not</li>
  <li>A link to register new sensors</li>
</ul>
<a href="addsensors.php">Register New Sensors!</a><br>
<a href="index.php">Home</a>

<?php

    // User info will be loaded into session, including their name and operator ID.
    $opid = 2;

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
        echo "<table>";
        echo "<tr><th>Sensor ID</th>";
        echo "<th>Global ID</th>";
        echo "<th>Application Label</th>";
        echo "<th>Measures</th>";
        echo "<th>Active</th></tr>";
        foreach($results as $row) {
            echo "<tr><td>".$row['sensor_id']."</td>";
            echo "<td>".$row['global_id']."</td>";
            echo "<td>".$row['application']."</td>";
            echo "<td>".$row['measures']."</td>";
            echo "<td>".$row['active']."</td>";
            echo "<td><button type='submit'>Deactivate</button></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>Empty set</h3>";
    }
?>

</body>
</html>
