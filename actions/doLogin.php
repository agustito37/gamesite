<?php
require_once('helpers.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

loginAction($email, $password);
