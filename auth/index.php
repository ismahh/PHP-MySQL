<?php
include_once("db_connect.php");
session_start();
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
	<h2>Example: Login and Registration Script with PHP, MySQL</h2>		
	<div class="collapse navbar-collapse" >
		<ul class="nav navbar-nav navbar-left">
			<?php 
            if (isset($_SESSION['user_id'])) 
            { 
                ?>
                <li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
                <li><a href="logout.php">Log Out</a></li>
			<?php 
            } 
            else 
            { 
                ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up With OTP and Password Checker AJAX</a></li>
                <li><a href="registerAPI.php">Sign Up With Password Checker API</a></li>
			<?php 
            } 
                ?>
		</ul>
	</div>	
</div>	