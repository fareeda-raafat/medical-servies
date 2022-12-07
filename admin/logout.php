<?php
require_once('../config.php');

session_destroy();

header('location:'.BURLA.'login.php');
?>