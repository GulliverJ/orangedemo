<?php
 session_start();
 
 // Function which checks the status of the session and updates the
 // last activity; should be called at the beginning of each file.
 // also checks to see if the user in $_SESSION exists, if not we
 // log out:
 function CheckSession()
 {
	 if( isset( $_SESSION['last_activity'] ) && (time() - $_SESSION['last_activity'] > 10080 ) )
	 {
		 // Log us out:
		 Logout();
		 return;
	 }
	 else
	 {
		 $_SESSION['last_activity'] = time();
	 }
	 
	 if( isset( $_SESSION['created'] ) && (time() - $_SESSION['created'] > 3600) )
	 {
		 session_regenerate_id( true );
		 $_SESSION['created'] = time();
	 }
	 
	 // Check that we're a valid user (nothing has been spoofed):
	 if( isset( $_SESSION['username'] ) )
	 {
		 $server_name = "localhost";
 		 $db_name = "orangesystem";
		 $db_username = "sensors";
 		 $db_password = "sensors";  
		 
		 try {
			 $connection = new PDO( "mysql:host=$server_name;dbname=$db_name", $db_username, $db_password );
			 $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			 
			 $sql_query = $connection->prepare( "SELECT EXISTS(SELECT 1 FROM operators WHERE `company` = ?)" );
			 $sql_query->execute( array($_SESSION['username']) );
			 
			 $row = $sql_query->fetch( PDO::FETCH_ASSOC );
			 if( !$row )
			 {
				 Logout();
				 return;
			 }
		 }
		 catch( PDOException $e )
		 {
			 Logout();
			 return;
		 }
	 }
 }
 
 // Logs out the user and destroys the session:
 function Logout()
 {
	 // Destroy the session:
	 session_unset();
	 session_destroy();
	 session_write_close();
 }
 
 // Performs a simple boolean check to see if we're logged in:
 function LoggedIn()
 {
	 // Make sure the session is valid:
	 CheckSession();
	 if( isset( $_SESSION['operator_id'] ) )
	 {
		 return true;
	 }
	 
	 return false;
 }
 
 // Gets the current username:
 function GetUsername()
 {
	 return isset( $_SESSION['username'] ) ? $_SESSION['username'] : "Not Logged In";
 }
 
 // Checks to see if a user can be logged in, if they can be then return true and log them in
 // else return false:
 function UserLogin( $username, $password )
 {
   $server_name = "localhost";
   $db_name = "orangesystem";
   $db_username = "sensors";
   $db_password = "sensors";  
	 
	 try {
		 $connection = new PDO( "mysql:host=$server_name;dbname=$db_name", $db_username, $db_password );
		 $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		 
		 $sql_query = $connection->prepare( "SELECT operator_id, password FROM operators WHERE `company` = ? LIMIT 1" );
		 $sql_query->execute( array( $username ) );
		 
	 
		 // Does the user exist?
		 $result = $sql_query->setFetchMode( PDO::FETCH_ASSOC );
		 if( $user = $sql_query->fetch() )
		 {			 
			 if( strcmp($password, $user['password']) == 0 )
			 {
				 $_SESSION['operator_id'] = (int)$user['operator_id'];
				 $_SESSION['username'] = $username;
				 $_SESSION['last_activity'] = time();
				 $_SESSION['created'] = time();
				 
				 return true;
			 }
		 }
	 }
	 catch( PDOException $e )
	 {
		 return false;
	 }
	 
	 return false;
 }

 // If we've been posted a username and password then we want to
 // see if we can log in:
 if( isset( $_POST['username'] ) && isset( $_POST['password'] ) )
 {
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 if( UserLogin( $username, $password ) )
	 {
		 // We're logged in:
		 header("location:portal.php");
	 }
	 else
	 {
		 // The login failed:
	 	header("location:sign_in.php");
	 }
 }
 else if( isset( $_POST['logout'] ) && $_POST['logout'] == true )
 {
	 Logout();
 }

?>