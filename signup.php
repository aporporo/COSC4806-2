<?php
  session_start();

//if logged in, redirect to index
if (isset($_SESSION['authenticated']) == 1) {
  header('location: /');
}

//error message for already existing username
  if (isset($_SESSION['username_error']) ) {
    echo "Username already exists";
    //error message for passwords not matching
  } else if (isset($_SESSION['password_match_error'])) {
    echo "Passwords do not match";
    //error message for passwords not meeting length requirements
  } else if (isset($_SESSION['password_length_error'])) {
    echo "Password must be at least 3 characters";
    //error message for passwords not meeting special character requirements
  } else if (isset($_SESSION['password_special_error'])) {
    echo "Password must contain only letters or numbers";
    
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