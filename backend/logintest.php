<?php include ("connectdb.php");  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="test.css">
</head>
<body>


<div class="d-flex justify-content-center align-items-center login-container">
        <form class="login-form text-center" action="logintest.php" method="post">
            <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
            <div class="form-group">
                <input type="email" class="form-control rounded-pill form-control-lg" placeholder="Email" name="loginEmail">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="loginPassword">
            </div>
            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" name="loginBtn">Log in</button>
            <p class="mt-3 font-weight-normal">Don't have an account? <a href="register.html"><strong>Register Now</strong></a></p>
        </form>
    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>