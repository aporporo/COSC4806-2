<?php

  session_start();

  $valid_username = "alex";
  $valid_password = "alex123";

  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username;
  $password = $_REQUEST['password'];

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