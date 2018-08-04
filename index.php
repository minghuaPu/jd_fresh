<?php

session_start(); 

// print_r($_SERVER);
// exit();

$C = include_once 'config.php';
include_once 'function.php';
include_once 'father/Model.php';
include_once 'father/smarty/Smarty.class.php';
include_once 'father/Control.php';
include_once 'father/Auth.php';
Control::run();
 
 
?>