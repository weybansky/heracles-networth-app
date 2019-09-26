<?php
require_once('dbconnection.php');
ob_start();
session_start();
if (isset($_POST['regBtn']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['mobile'];
    $enc_password=md5($password);
    $a=date('Y-m-d');
 //Validation 
 if(empty($fullname) || empty($email) || empty($contact) || empty($Cpassword) ){
  //note that i am making the errors unique ...
  header("Location: ../signup.php?error=emptyfields");
  exit();

}elseif($password !== $Cpassword){
  header("Location: ../signup.php?error=passwordmatch");
  exit();

} else{

    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

  	if ($user) { // if user exists
    	if ($user['email'] === $email) {
        header("Location: ../signup.php?error=userAlreadyExist");
        exit();
    }
  }

    
    $msg=mysqli_query($con,"insert into users(fullname,email,password,contactno,posting_date) values('$fullname','$email','$enc_password','$contact','$a')");
    if($msg)
    {
      header("Location: ../signin.php");
    }
  }
}  
