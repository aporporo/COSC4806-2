<?php

require_once('database.php');

Class user {
  //get all users from user table
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
  //create user and insert into user table
  public function create_user ($username, $password) {
    $db = db_connect();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES ('$username', '$hash')");
    $statement->execute();
    
  }
  //check if username exists in user table
  public function check_user_exists ($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = '$username'");
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    if (isset($rows['username'])) {
      return true;
    } else {
      return false;
    }
  
  }
  //check if username and password match data from user table
  public function check_username_password ($username, $password) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = '$username'");
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    if (isset($rows['username'])) {
      $hash = $rows['password'];
      if (password_verify($password, $hash)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}