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
  } else if ($password != $password2) {
    $_SESSION['password_match_error'] = 1;
    header ('location: /signup.php');
  } else if (strlen($password) < 3) {
    $_SESSION['password_length_error'] = 1;
    header ('location: /signup.php');
  // } else if (!ctype_alnum($password)) {
  } else if (!ctype_alnum($password)) {
    $_SESSION['password_special_error'] = 1;
    header ('location: /signup.php');
  }
  else {
    $user->create_user($username, $password);
    //echo "User created";
    header ('location: /login.php');
  }


?>