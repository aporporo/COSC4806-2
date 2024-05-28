<?php
  require_once ('user.php');
  session_start();

//if logged in, redirect to index
if (isset($_SESSION['authenticated']) == 1) {
  header('location: /');
  die;
}

  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username;
  $password = $_REQUEST['password'];
  $user = new User();

  //check username and password exists in database
  if ($user->check_username_password($username, $password)) {
    $_SESSION['authenticated'] = 1;
    header ('location: /');
    //if username and password do not exist, increment login attempts
  } else {
    if (!isset($_SESSION['login_attempts'])){
      $_SESSION['login_attempts'] = 1;
    } else {
      $_SESSION['login_attempts']++;
    }
    header ('location: /login.php');
  }
?>