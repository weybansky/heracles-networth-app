<?php
require_once('dbconnection.php');
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  $msg = "You are already logged in";
  header("location:../dashboard.php?error=You are already Loggedin");
}
if (isset($_POST['loginBtn'])) {
  $password=$_POST['password'];
  $dec_password=md5($password);
  $useremail=$_POST['email'];
  $ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
  $num=mysqli_fetch_array($ret);
  if($num>0)
  {//we are going to use this part for when we want to implement "remember me"
  //   if (isset($_POST["remember"])) {
  //     setcookie("heraclesuser", $_POST["fullname"], time() + (30 * 24 * 60 * 60));
  // } else {
  //     if (isset($_COOKIE["heraclesuser"])) {
  //         setcookie("heraclesuser", "");
  //     }
  $extra="welcome.php";
  $_SESSION['loggedin'] = true;
  $_SESSION['login']=$_POST['email'];
  $_SESSION['id']=$num['id'];
  $_SESSION['name']=$num['fullname'];
  $host=$_SERVER['HTTP_HOST'];
  
  $msg = "Logged in successfully";
  header("location:../dashboard.php?error=Logged_In_successfully");

  exit();
  }
  else
  {
  header("location:../signin.php?error=Invalid_Username_and_Password");
  exit();
  }
  }
  
  

