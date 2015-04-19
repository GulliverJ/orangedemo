<?php
 session_start();

 $server_name = "localhost";
 $db_name = "orangesystem";
 $db_username = "sensors";
 $db_password = "sensors";  
 
 try {
	 $connection = new PDO( "mysql:host=$server_name;dbname=$db_name", $db_username, $db_password );
	 $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 
	 $company = $_POST['company_name'];
	 $contact = $_POST['contact_name'];
	 $password = $_POST['password'];
	 $email = $_POST['email'];

	 // Check to see if that username exists:
	 $sql_statement = $connection->prepare( "SELECT COUNT(*) FROM operators WHERE `company` = ? LIMIT 1;" );
	 $sql_statement->execute( array( $company ) );
	 if( $sql_statement->fetchColumn() > 0 )
	 {
		 // That username already exists:
		 die( "That username already exists" );
	 }

	 // Add the user to the database:
	 $sql_statement = $connection->prepare( "INSERT INTO operators(company, password, contact_name, contact_address) VALUES (?, ?, ?, ?);" );
	 $sql_statement->execute( array( $company, $password, $contact, $email ) );

	 // Get the user's operator ID:
	 $sql_statement = $connection->prepare("SELECT operator_id FROM operators WHERE company = ?;");
	 $sql_statement->execute(array($company));

	 $operator_id = $sql_statement->fetchColumn();

	 // Generate a random identifier code
	 $identifier = GenerateIdentifier( $connection );
	 $sql_statement = $connection->prepare("INSERT INTO identifiers(operator_id, identifier) VALUES (?, ?);");
	 $sql_statement->execute(array($operator_id, $identifier));

	 // Create new mysql user for this operator and grant permissions to select TODO: they may no longer need a user
	 /*
	 $sql_statement = $connection->prepare("CREATE USER '" . $company . "'@'localhost' IDENTIFIED BY '" . $password . "';");
	 $sql_statement->execute();
	 $sql_statement = $connection->prepare("GRANT SELECT ON orangesystem.sensors TO '" . $company . "'@'localhost';");
	 $sql_statement->execute();*/

	 $_SESSION['operator_id'] = (int)$operator_id;
	 $_SESSION['username'] = $company;
	 $_SESSION['last_activity'] = time();
	 $_SESSION['created'] = time();

	 header("location:portal.php");

 }
 catch( PDOException $e )
 {
 	 var_dump($e);
	 die( "There was an internal database error whilst creating your user, error code (" . $e->getCode() . ")" );
 }
 
 // Purpose: Generate a random unique 30 character string to represent the individual
 // who is trying to verify themselves:
 function GenerateIdentifier( $connection ) 
 {
	 $sql_statement = $connection->prepare( "SELECT COUNT(*) FROM identifiers WHERE `identifier` = ? LIMIT 1" );
	
	 $alphabet = '0123456789abcdefghijklmnopqrstuvxyz';
	 $string = "";
	  
	 for( $i = 0; $i < 8; $i++ ) 
	 {
	  $string .= $alphabet[ rand( 0, strlen($alphabet)-1 ) ];
	 }

   // Check to see if there is a user with this random string:
   $sql_statement->execute( array( $string ) );	 
	 if( $sql_statement->fetchColumn() <= 0 )
		 {
			 return $string;
		 }

 }

?>
