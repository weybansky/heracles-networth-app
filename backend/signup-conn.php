<?php
// signup

if(isset($_POST['regBtn'])){
// selecting all data from table users to check if email already exists
	$username = $_POST['username'];
 	$email = $_POST['email'];
 	$phone = $_POST['phone'];
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
} 	else if($username == "" || $email = "" || $password == "" || 
	$confirmPassword == "" || $phone == ""){
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
		$reg = mysqli_query($db, "INSERT INTO users(username, email, password, phone) 
			VALUES('$username', '$email', '$password', '$phone')");
	if(!$reg){
		die("unable to connect: " . mysqli_error($db));
	}
		// redirects to login page once all conditions are met
		array_push($valids, "Registeration Successful");
		header("Location: logintest.php");      
}

}


?>