<?php

require "vendor/autoload.php";
require_once 'User.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);                                                                     
$user = new User(123, "Kolya", "niko", "060203149184912");
echo $user->get_name() . " was create in " . $user->get_date_of_init();
?>