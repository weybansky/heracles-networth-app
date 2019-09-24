<?php
session_start();
	
	$username = "";
 	$email = "";
 	$password = "";
 	$password = md5($password);
 	$errors = array();

$db = mysqli_connect("us-cdbr-iron-east-02.cleardb.net","b0ae198915bb2d", "16a1a0d0", "heroku_6639abf7d3c0725");
if(!$db){
	die("unable to connect: " . mysqli_error($db));
}

 
 	include ("signup-conn.php");   
	include ("loginn-conn.php");  
	include ("logout-conn.php");  
?>