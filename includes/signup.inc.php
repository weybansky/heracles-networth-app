<?php

$servername = "localhost";
$dbUsername="root";
//if i get any error.. i will check the password and change it 
$dbPassword = "chukky162";
$dbName ="loginsystem";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,$dbName );

if (!$conn) {
  die("Connection failed".mysqli_connect_error());
}
if (isset($_POST['regBtn'])){

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];


  

  if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
    array_push($errors, "One or more fields cannot be empty");
    exit();
  }
  // elseif((!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
  //   header("Location:  ../signup.php?error=invalidemailsandusername");
  //   exit();
  // }
  
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Please input a correct Email");
    exit();
  }
  elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    array_push($errors, "please input a correct Username ");
    exit();
  }
  elseif($password !== $confirmPassword){ 
     array_push($errors, "Password Mismatch");
     exit();
    }
    else{
      $sql = "SELECT * FROM users WHERE email=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        array_push($errors, "Connection to db error");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt,"s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows();
        if ($resultCheck>0) {
          array_push($errors, "User emal already taken ");
          exit();
        }else{
          $sql = "INSERT INTO users (username, email, pwd) VALUES (?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            array_push($errors, "Sql error");
            exit();
          }
          else{
            //hashing password using bcrypt 
            $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"sss", $username,$email,$hashedPwd);
            mysqli_stmt_execute($stmt);
            array_push($errors, "Successfully signed in");
            exit();              
            header("Location: login.php"); 
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else{
    header("Location: ../signup,php");
    exit();    
  }