<?php include('app_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset </title>
	<link rel="stylesheet" href="main.css">
</head>
<body>

	<form class="login-form" action="login.php" method="post" style="text-align: center;">
		<p>
			A Password reset link <b><?php echo $_GET['email'] ?></b> has been sent to your Mailbox. 
		</p>
	    <p>Please login into your email account and click on the link, to reset your password</p>
	</form>
		
</body>
</html>