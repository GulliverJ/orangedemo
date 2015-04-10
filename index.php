<?php
 require( 'user_manager.php' );
?>

<!DOCTYPE html>

<html>
<body>
<h1>Orange Sensors</h1>
<p>This page to have a search function, button to log in, and a link to register as a new user.</p>
<a href="register.php">Sign up!</a>
<form name="login" method="post" action="user_manager.php" id="login" novalidate>
  <label for="username">Username or Company Name:</label>
  <input name="username" id="username" type="text" placeholder="Username" title="Enter your username">
  <label for="password">Password Name:</label>
  <input name="password" id="password" type="password" placeholder="Password" title="Enter your password">
  <button type="submit" name="login">Log in</button>
</form>
</body>
</html>
