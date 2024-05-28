<?php
  require_once ('user.php');
  session_start();
  session_unset();
  


  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $password2 = $_REQUEST['password2'];
  $user = new User();

  //check username exists in database
  if ($user->check_user_exists($username)) {
    $_SESSION['username_error'] = 1;
    header ('location: /signup.php');
  //check passwords match
  } else if ($password != $password2) {
    $_SESSION['password_match_error'] = 1;
    header ('location: /signup.php');
  //check password length
  } else if (strlen($password) < 3) {
    $_SESSION['password_length_error'] = 1;
    header ('location: /signup.php');
  //check password contains only letters and numbers
  } else if (!ctype_alnum($password)) {
    $_SESSION['password_special_error'] = 1;
    header ('location: /signup.php');
  }
  //if all checks pass, create user
  else {
    $user->create_user($username, $password);
    header ('location: /login.php');
  }


?>