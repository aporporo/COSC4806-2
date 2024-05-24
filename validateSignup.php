<?php
  require_once ('user.php');
  session_start();


  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $password2 = $_REQUEST['password2'];
  $user = new User();

  //check username exists in database
  if ($user->check_user_exists($username)) {
    //echo "Username already exists";
    $_SESSION['username_error'] = 1;
    header ('location: /signup.php');
  } else {
    $user->create_user($username, $password);
    //echo "User created";
    header ('location: /login.php');
  }

?>