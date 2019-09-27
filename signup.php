<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Heracles | Signup</title>
    <link rel="icon" href="images/Heracles.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="login-container">
            <div class="login-bg">
                    <div class="login-content">
                 
                    <div class="signup-form animated slideInLeft">
                    
                         <?php
                            if (isset($_GET["error"])) {
                               if ($_GET['error']=='userAlreadyExist') {
                                    echo '<p><p style = "text-align:center" class="text-danger"> User already exists</p><p>';
                                   }elseif($_GET['error']=='emptyfields'){
                                    echo '<p><p style = "text-align:center" class="text-danger"> PLease fill all fields correctly</p><p>';
                                   }
                                   
                                   elseif($_GET['error']=='pwd'){
                                    echo '<p><p style = "text-align:center" class="text-danger"> please confirm password</p><p>';
                                   }
                                   
                                   elseif($_GET['error']=='num'){
                                    echo '<p><p style = "text-align:center" class="text-danger"> Check your Number</p><p>';
                                   }
                                   
                                   elseif($_GET['error']=='emails'){
                                    echo '<p><p style = "text-align:center" class="text-danger"> Check your Email</p><p>';
                                   }

                                   
                                   elseif($_GET['error']=='name'){
                                    echo '<p><p style = "text-align:center" class="text-danger"> Check your name</p><p>';
                                   }

                                   else{
                                    echo '<p><p style = "text-align:center" class="text-danger">Something is not right</p><p>';
                                   }    
                                }
                           ?> 
                         <form action="includes/signup.inc.php" method="POST" name="form" onsubmit="return formValidation()">
                            <div class="form-header">
                                    <img class="heracles-logo" src="https://res.cloudinary.com/benjee/image/upload/v1569459183/Heracles_Logo_2_qve8nw.svg" alt="Heracles">    
                                    <h1>Create Your Account</h1>
                                </div>
                            <div class="form-group">
                                <input type="text" class="login-control" id="fullname" placeholder="Fullname"  name="fullname" required>
                                </div>
                            <div class="form-group" >
                                <div class="input-control">
                                    <input type="email" class="login-control" id="email" name="email"placeholder="Email Address" required>
                                    <input type="text" class="login-control" id="mobile"name="mobile" placeholder="Phone number" required>
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="input-control">
                                    <input type="password" class="login-control" id="password" placeholder="Password"   name="password" required>
                                    <input type="password" class="login-control" id="Cpassword"name="confirmPassword" placeholder="Confirm Password"  required>
                                </div>
                            </div>
                            <button type="submit" name="regBtn"class="btn signup-btn">create account</button>
                            <div class="register d-flex">
                                    <p class="mx-auto"> Already have an account?
                                        <a class="nav-item text-dark" href="signin.php">Log in</a>
                                    </p>
                                </div>
                        </form> 
                    </div>        
                    </div>
                    
                </div>
            </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type ='text/javascript' src = 'js/signup.js'></script>
</body>
</html>
