<!-- PLEASE READ -->
<!-- all connections done here for signup, login and logout -->
<!-- create a database locally "networth-calculator" with a 4-row table named "users" -->
<!-- users table will have "id","username","email","password" -->
<!-- feel free to add your conditions -->

<?php

session_start();
	
	$username = "";
 	$email = "";
 	$password = "";
 	$password = md5($password);
 	$errors = array();

$db = mysqli_connect("localhost","root", "", "networth-calculator");
if(!$db){
	die("unable to connect: " . mysqli_error($db));
}

// signup

if(isset($_POST['regBtn'])){
// selecting all data from table users to check if email already exists
	$username = $_POST['username'];
 	$email = $_POST['email'];
 	$password = $_POST['password'];
 	$confirmPassword = $_POST['confirmPassword'];
 	$password = md5($password);

 	$s = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");
	if(!$s){
	die("unable to connect: " .mysqli_error($db));

	// checking if email exists and other conditions
	$num = mysqli_num_rows($s);
	if($num == 1){
		array_push($errors, "Email exists");
} 	else if($username == "" || $email = "" || $password == "" || $confirmPassword == ""){
	array_push($errors, "One or more fields cannot be empty");
}
	else if($password != $confirmPassword){
		array_push($errors, "Password Mismatch");
}
}	else if($username < 5){
		array_push($errors, "Username cannot be less than 5 characters");
}	else if($password < 6){
		array_push($errors, "Password cannot be less than 6 characters");
}	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){ 
		array_push($errors, "Invalid Email");
}
		// inserting information if all conditions are met
	else{
		$reg = mysqli_query($db, "INSERT INTO users(username, email, password) 
			VALUES('$username', '$email', '$password')");
	if(!$reg){
		die("unable to connect: " . mysqli_error($db));
	}
		// redirects to login page once all conditions are met
		header("Location: login.php");      
}

}


// login

if(isset($_POST['loginBtn'])){

}


// logout

if(isset($_GET['logoutBtn'])){
	
}


?>