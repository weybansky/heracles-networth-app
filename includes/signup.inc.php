<?php
ob_start();
session_start();
if (isset($_POST['regBtn'])){
//Make sure that u put your own local db info and create it with the following 
#id set to int auto increment
#username set to VARCHAR 255
#email set to VARCHAR 255
#pwd (meaning password)

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
//hashing pw with bcrypt hashing
if($password == $confirmPassword){
$password = password_hash(hash('sha384', $password, true), PASSWORD_DEFAULT);} 
else {unset($password);}
$mobile = $_POST['mobile'];

$servername = "us-cdbr-iron-east-02.cleardb.net";
$dbUsername="b0ae198915bb2d";
$dbPassword = "16a1a0d0";
$dbName ="heroku_6639abf7d3c0725";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword,$dbName );
// $errors = [];
if (!$conn) {
  die("Connection failed".mysqli_connect_error());
}  

//checking db for similar entries
$username =mysqli_query($conn, ("SELECT * from heroku_6639abf7d3c0725.users WHERE fullname = '$fullname'"));
$email =mysqli_query($conn, ("SELECT * from heroku_6639abf7d3c0725.users WHERE email = '$email'"));
$phone =mysqli_query($conn, ("SELECT * from heroku_6639abf7d3c0725.users WHERE phone = '$mobile'"));

$result1 = mysqli_num_rows($username);
$result2 = mysqli_num_rows($email);
$result3 = mysqli_num_rows($phone);

if (isset($password) && $result1==0 && $result2==0 && $result3==0){

  mysqli_query($con,("INSERT INTO heroku_6639abf7d3c0725.users(fullname, email, phone, password) VALUES 
    ('$fullname','$email', '$mobile', '$password')"));
    $message1 = "Signup successful";
    echo "<script type='text/javascript'>alert('$message1');</script>";

}    elseif ($result1 > 0){

  $message2 = "This name already exists";
  echo "<script type='text/javascript'>alert('$message2');</script>";

      } elseif (!isset($password)){

   $message3= "Passwords don't match";
  echo "<script type='text/javascript'>alert('$message3');</script>";

  } elseif ($result2 > 0){

      $message4 = "This email address is already in use";
      echo "<script type='text/javascript'>alert('$message4');</script>";

  } elseif ($result3 > 0){

      $message5 = "This phone number is already in use";
     echo "<script type='text/javascript'>alert('$message5');</script>";

  } elseif ($fullname || $email || $mobile || $password || $confirmPassword){

      $message6 = "Please fill all fields!";
      echo "<script type='text/javascript'>alert('$message6');</script>";

  } 
       
mysqli_close($con);
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
