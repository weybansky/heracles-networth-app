<?php
// login

if(isset($_POST['loginBtn'])){
	$email = $_POST['loginEmail'];
 	$password = $_POST['loginPassword'];

 	if(empty($email)){
 		array_push($errors, "Email is required");
 	}

 	if(empty($password)){
 		array_push($errors, "Password is required");
 	}

 	if(count($errors) == 0){
 		$password = md5($password);
 		$query = mysqli_query($db, "SELECT * FROM users 
 			WHERE email = '$email' AND password = '$password' ");

 		if(mysqli_num_rows($query) == 1){
 			// $_SESSION['username'] = $username;
 			$_SESSION['success'] = "You are now logged in";
 			header("Location: hometest.php");
 		} else{
 			array_push($errors, "Wrong Username/Password");
 		}
 	}
}

?>