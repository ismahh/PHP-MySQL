<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$emailOTP = uniqid();
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		$hash = password_hash($password,PASSWORD_BCRYPT);
		if(mysqli_query($conn, "INSERT INTO users(user, email, pass, otphash) VALUES('" . $name . "', '" . $email . "', '" . $hash . "', '" . $emailOTP . "')")) 
		{
			$success_message = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
			sendEmail($email,$emailOTP,$conn); 
			
		} 
		else {
			
			$error_message = mysqli_error($conn);
		}
	}
}

function sendEmail($email,$hash,$conn)
{
	include_once("db_connect.php");

    try {
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Mailer="smtp";
		$mail->SMTPDebug = false;
	
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->Host = 'smtp.gmail.com';
		$mail->Username = 'fastest25000@gmail.com';
		$mail->Password = 'vxcutppatipcubbu';
	
		// Content
		$mail->isHTML(true);          
		$mail->addAddress($email); 
		$mail->setFrom('fastest25000@gmail.com', 'Admin');                       
		$mail->Subject = 'Email Verification Code';
		$mail->Body = 'Thank you for your registeration. Here is your code <b>'.$hash.'</b>';
		$mail->AltBody = 'Thank you for your registeration. Here is your code <b>'.$hash.'</b>';
	
		$mail->send();
		$zero = 0;
		$thisdate = date("Y-m-d H:i:s");
		if(mysqli_query($conn, "INSERT INTO authentication(otp, expired, created) VALUES('" . $hash . "', '" . $zero . "', '" . $thisdate . "')")) 
		{
			echo "<script>window.location.assign('emailConfirm.php')</script>";
		} 
		else 
		{
			$error_message = "Please try again later";
			echo $error_message;
			//echo mysqli_error($conn);
		}
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--Email AJAX-->
<script type="text/javascript" src="emailAjax.js"></script>
<script type="text/javascript" src="checkPass.js"></script>

<div class="container">
<h2>Example: Login and Registration Script with PHP, MySQL</h2>	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					</div>					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" id="email" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
						<div id="emailStatus"></div>
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" id="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
						<div id="passCheck"></div>
						<input type='checkbox' onclick="reveal1()">Reveal Password</input>
							<script>
								function reveal1() 
								{
									var x = document.getElementById("password");
									if (x.type === "password") {
										x.type = "text";
									} else {
										x.type = "password";
									}
								}

							</script>

					</div>
					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
						<input type='checkbox' onclick="reveal2()">Reveal Password</input>
							<script>
								function reveal2() 
								{
									var x = document.getElementById("cpassword");
									if (x.type === "password") {
										x.type = "text";
									} else {
										x.type = "password";
									}
								}
							</script>
					</div>
					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>	
</div>

