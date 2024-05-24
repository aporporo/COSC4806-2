<?php

require_once ('user.php');

$user = new user();
$user_list = $user->get_all_users();

print_r ($user_list);

?>