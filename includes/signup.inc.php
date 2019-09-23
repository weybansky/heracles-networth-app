<?php
//Make sure that u put your own local db info and create it with the following 
#id set to int auto increment
#username set to VARCHAR 255
#email set to VARCHAR 255
#pwd (meaning password)
$servername = " us-cdbr-iron-east-02.cleardb.net";
$dbUsername="b0ae198915bb2d";
$dbPassword = "16a1a0d0";
$dbName ="heroku_6639abf7d3c0725";

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
          array_push($errors, "User email already taken ");
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
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <main>

  <section>
    <h1>SignUp</h1>
   <?php
    // if(isset($_GET['error'])){
    //   if($_GET){
    //    echo '<p> Fill in all fields';
    //   }elseif($_GET['error'] == "invalid..."){
    //     echo "...";
    //   }
    // }elseif(){
      
    // }
   ?>
   <html>
   <main>
   <section>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" placeholder ="Username">
        <input type="text" name="email" placeholder ="E-mail">
        <input type="password" name="password" id="" placeholder='Password...'>
        <input type="password" name="confirmpassword" id="" placeholder='Repeat Password...'>
        <button type="submit" name="regBtn">Submit</button>
      </form>
  </section>
</main>
</body>
</html>
