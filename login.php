<?php
  session_start();

  //if logged in, redirect to index
  if (isset($_SESSION['authenticated']) == 1) {
    header('location: /');
  }

  if (isset($_SESSION['login_attempts'])) {
    echo "Unsuccessful attempt: " . $_SESSION['login_attempts'];
  } else {
    echo " ";
  }
?>

<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <h1>Login form</h1>
    <form action="/validate.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"/></br></br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"/></br></br>
      <input type="submit" name="btnLogin" value="Login"/></br></br>

    </form>
    <p><a href="/signup.php">Register</p>


  </body>


</html>