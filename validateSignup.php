<?php
  require_once ('user.php');
  session_start();


  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username;
  $password = $_REQUEST['password'];
  $password2 = $_REQUEST['password2'];

  if ($valid_username == $username && $valid_password == $password) {
    $_SESSION['authenticated'] = 1;
    header ('location: /');
  } else {
    if (!isset($_SESSION['login_attempts'])){
      $_SESSION['login_attempts'] = 1;
    } else {
      $_SESSION['login_attempts']++;
    }
    header ('location: /login.php');

  }

?>