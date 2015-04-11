<?php

  session_start();

  $server_name = "localhost";
  $db_name = "orangesystem";
  $db_username = "sensors";
  $db_password = "sensors";  

  try {
    $connection = new PDO( "mysql:host=$server_name;dbname=$db_name", $db_username, $db_password );
    $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    $application = $_POST['application'];
    $measures = $_POST['measures'];
    $unit = $_POST['unit'];
    $lat = $_POST['lat']; 
    $lng = $_POST['lng']; 

    // Retrieve the current max sensor_id belonging to this user
    $sql_statement = $connection->prepare("SELECT sensor_id FROM sensors WHERE operator_id = '" . $_SESSION['operator_id'] . "'ORDER BY sensor_id DESC LIMIT 1;");
    $sql_statement->execute();
    
    $sensor_id = $sql_statement->fetchColumn();
    if(empty($sensor_id)) {
      $sensor_id = 1;
    } else {
      $sensor_id = $sensor_id + 1;
    }
    echo $sensor_id;
    
    // Add the sensor to the database:
    $sql_statement = $connection->prepare( "INSERT INTO sensors(operator_id, sensor_id, application, measures, unit, lat, lng) VALUES (?, ?, ?, ?, ?, ?, ?);" );
    $sql_statement->execute( array( $_SESSION['operator_id'], $sensor_id, $application, $measures, $unit, $lat, $lng));

    // At this point, the code should communicate to Java that a new sensor has been added.
    // The java code initialises the sensor in the Cassandra table, and once that is done it
    // sets the sensor as 'active' in this SQL table.

    header("location:portal.php");

  }
  catch( PDOException $e )
  {
    var_dump($e);
    die( "There was an internal database error whilst creating your user, error code (" . $e->getCode() . ")" );
  }
?>