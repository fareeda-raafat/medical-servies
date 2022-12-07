<?php
session_start();

define("BURL",'http://127.0.0.1/medical_service/');
define("BURLA",'http://127.0.0.1/medical_service/admin/');
define("ASSETS",'http://127.0.0.1/medical_service/assets/');

define("BL",__DIR__.'/');
define("BLA",__DIR__.'/admin/');


//connect to database

require(BL."function/db.php");
?>

