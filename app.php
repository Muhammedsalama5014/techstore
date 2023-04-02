<?php 

use TechStore\Classes\Request;
use TechStore\Classes\Session;
// to incload all main data that i need in site and use it

//1 paths & urls

 /*$path = "C:/xampp/htdocs/techstore/";   // abslute path but we will use dynamic method*/
 define("PATH", __DIR__ . "/");
 define("URL","http://localhost/techstore/");

 define("APATH", __DIR__ . "/admin/");
 define("AURL","http://localhost/techstore/admin/");



//DB credantioals
define("DB_SERVER","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","techstore");

// incloude classes 
require_once(PATH."vendor/autoload.php");


// required objects

$request = new Request;
$session = new Session;

?>