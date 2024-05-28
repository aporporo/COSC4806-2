<?php
  session_start();

  if (isset($_SESSION['username_error']) ) {
    echo "Username already exists";
    
  } else if (isset($_SESSION['password_match_error'])) {
    echo "Passwords do not match";
    
  } else if (isset($_SESSION['password_length_error'])) {
    echo "Password must be at least 3 characters";
    
  } else if (isset($_SESSION['password_special_error'])) {
    echo "Password must contain only letters or numbers";
    
  } else {
    echo " ";
  }

  // if (isset($_SESSION['login_attempts'])) {
  //   echo "Unsuccessful attempt: " . $_SESSION['login_attempts'];
  // } else {
  //   echo " ";
  // }
  // unset($_SESSION['username_error']);
  // unset($_SESSION['password_match_error']);
  // unset($_SESSION['password_length_error']);
  // unset($_SESSION['password_special_error']);
?>

<html>
  <head>
    <title>Signup</title>
  </head>
  <body>
    <h1>Register an account</h1>
    <form action="/validateSignup.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"/></br></br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"/></br></br>
      <label for="password">Confirm Password:</label>
      <input type="password" name="password2" id="password"/></br></br>
      <input type="submit" name="btnLogin" value="Register"/></br></br>

    </form>
    <p><a href="/login.php">Login</p>



  </body>


</html>