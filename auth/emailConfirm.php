<?php
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
$error = false;

if(!empty($_POST["authenticate"]) && $_POST["otp"]!='') {
	//$sqlQuery = "SELECT * FROM authentication WHERE otp='".$_POST["otp"]."' AND expired!=1 AND NOW() <= DATE_ADD(created, INTERVAL 1 HOUR)";
	$sqlQuery = "SELECT * FROM authentication WHERE otp='".$_POST["otp"]."' AND expired!=1 AND DATE_ADD(created, INTERVAL 1 HOUR)";
	$result = mysqli_query($conn, $sqlQuery);
	$count = mysqli_num_rows($result);
	echo $count;
	
	if(!empty($count)) {
		$sqlUpdate = "UPDATE authentication SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'";
		$result = mysqli_query($conn, $sqlUpdate);
		header("Location:login.php");
	} else {
		$errorMessage = "Invalid OTP!";
	}	
} else if(!empty($_POST["otp"])){
	$errorMessage = "Enter OTP!";
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

<div class="container">
<h2>Example: Login and Registration Script with PHP, MySQL</h2>	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="authenticateform">
				<fieldset>
					<legend><center>Insert OTP Number</legend>
					<div class="form-group">
						<label for="otp">Please Enter your OTP</label>
						<input type="text" name="otp" placeholder="OTP" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					</div>	
					<div class="form-group">
						<input type="submit" name="authenticate" value="submit" class="btn btn-primary" />
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

