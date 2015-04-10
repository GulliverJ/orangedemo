<!DOCTYPE html>
<html>
<body>
<h1>Register</h1>
<form name="signup" method="post" action="signup.php" id="signup-form" novalidate>
  <label for="username">Username (e.g. Company name):</label>
  <input name="company_name" id="company_name" class="form-control" type="text" placeholder="Choose a username" title="Enter your username">
  <label for="contact">Contact Name:</label>
  <input name="contact_name" id="contact_name" class="form-control" type="text" placeholder="Choose a username" title="Enter your username">
  <label for="pass">Password:</label>
  <input name="password" id="password" type="password" placeholder="Choose a password" title="Enter your password">
  <label for="email">Email Address:</label>
  <input name="email" id="email" type="email" placeholder="Enter your email address" title="Enter your email address">
  <button type="submit" name="submit">Submit</button>
</form>
<p>After clicking the submit button, if everything's worked out alright, they should be redirected to the management portal page</p>
<a href="portal.php">Management Portal</a><br>
<a href="index.php">Home</a>
</body>
</html>