<?php
  session_start();

  if (isset($_SESSION['login_attempts'])) {
    echo "Unsuccessful attempt: " . $_SESSION['login_attempts'];
  } else {
    echo " ";
  }
?>

<html>
  <head>
    <title>Signup</title>
  </head>
  <body>
    <h1>Register an account</h1>
    <form action="/validate.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"/></br></br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"/></br></br>
      <label for="password">Confirm Password:</label>
      <input type="password" name="password" id="password"/></br></br>
      <input type="submit" name="btnLogin" value="Register"/></br></br>

    </form>
    <p><a href="/login.php">Login</p>



  </body>


</html>