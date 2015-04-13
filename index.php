<?php
 require( 'user_manager.php' );
?>
<!DOCTYPE html>
<html>
<head>
  <title>Orange Sensors</title>
</head>
<body>
<h1>Orange Sensors</h1>

<?php
if(LoggedIn()) { ?>
    <h4>Logged in as <?php echo GetUserName(); ?>.</h4>
    <a href="logout.php">Log out</a>
    <a href="portal.php">Manage my sensors</a><?php
} else {
?>

<a href="register.php">Sign up!</a>
<h3>Log in!</h3>
<form name="login" method="post" action="user_manager.php" id="login" novalidate>
  <label for="username">Username or Company Name:</label>
  <input name="username" id="username" type="text" placeholder="Username" title="Enter your username">
  <label for="password">Password Name:</label>
  <input name="password" id="password" type="password" placeholder="Password" title="Enter your password">
  <button type="submit" name="login">Log in</button>
</form>

<?php
}
?>
</body>
</html>
