<style>
body {
	background-image: url("images/bg.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
.card-header {
	text-align: center;
	background-color: #ff0000;
}
</style>

<?php
	session_start();
	
	
	// Check if user is already logged in
	if(isset($_SESSION['loggedIn'])){
		header('Location: index.php');
		exit();
	}
	
	require_once('inc/config/constants.php');
	require_once('inc/config/db.php');
	require_once('inc/header.html');
?>
  <body>

<?php
// Variable to store the action (login, register, passwordReset)
$action = '';
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		if($action == 'register'){
?>
			<div class="container">
			  <div class="row justify-content-center" >
			  <div class="col-sm-12 col-md-5 col-lg-5">
				<div class="card">
				  <div class="card-header">
					Register
				  </div>
				  <div class="card-body">
					<form action="">
					<div id="registerMessage"></div>
					  
					   <div class="form-group">
						<label for="registerUsername">Username<span class="requiredIcon">*</span></label>
						<input type="email" class="form-control" id="registerUsername" name="registerUsername" autocomplete="on">
					  </div>
					  <div class="form-group">
						<label for="registerPassword1">Password<span class="requiredIcon">*</span></label>
						<input type="password" class="form-control" id="registerPassword1" name="registerPassword1">
					  </div>
					  <div class="form-group">
						<label for="registerPassword2">Re-enter password<span class="requiredIcon">*</span></label>
						<input type="password" class="form-control" id="registerPassword2" name="registerPassword2">
					  </div>
					  <a href="login.php" class="btn btn-primary"> Admin Login</a>
					  <button type="button" id="register" class="btn btn-success">Employee Login</button>
					  <a href="login.php?action=resetPassword" class="btn btn-warning">Reset Password</a>
					  <button type="reset" class="btn">Clear</button>
					</form>
				  </div>
				</div>
				</div>
			  </div>
			</div>
<!--<?php
			require 'inc/footer.php';
			echo '</body></html>';
			exit();
		} elseif($action == 'resetPassword'){
?>--
			<div class="container">
			  <div class="row justify-content-center">
			  <div class="col-sm-12 col-md-5 col-lg-5">
				<div class="card">
				  <div class="card-header">
					Reset Password
				  </div>
				  <div class="card-body">
					<form action="">
					<div id="resetPasswordMessage"></div>
					  <div class="form-group">
						<label for="resetPasswordUsername">Username</label>
						<input type="text" class="form-control" id="resetPasswordUsername" name="resetPasswordUsername">
					  </div>
					  <div class="form-group">
						<label for="resetPasswordPassword1">New Password</label>
						<input type="password" class="form-control" id="resetPasswordPassword1" name="resetPasswordPassword1">
					  </div>
					  <div class="form-group">
						<label for="resetPasswordPassword2">Confirm New Password</label>
						<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
					  </div>
					  <a href="login.php" class="btn btn-primary">Login</a>
					  <a href="index.php?action=register" class="btn btn-success">Employee login</a>
					  <button type="button" id="resetPasswordButton" class="btn btn-warning">Reset Password</button>
					  <button type="reset" class="btn">Clear</button>
					</form>
				  </div>
				</div>
				</div>
			  </div>
			</div> -->
<?php
			require 'inc/footer.php';
			echo '</body></html>';
			exit();
		}
	}	
?>
	<!-- Default Page Content (login form) -->
<html>
    <div class="container" style="font-family:Arial Black">
      <div class="row justify-content-center">
	  <div class="col-sm-12 col-md-5 col-lg-5">
		<div class="card">
		  <div class="card-header" style="background-color: #0000">
		<center>
			<img src="images/gclogo.png" style="width: 18%; height:25%;">
			<img src="images/logo.png" style="width: 25%; height:25%;">
		</center>
			Login
		  </div>
		  <div class="card-body">
			<form action="">
			<div id="loginMessage"></div>
			  <div class="form-group">
				<label for="loginUsername">Username</label>
				<input type="text" class="form-control" id="loginUsername" name="loginUsername">
			  </div>
			  <div class="form-group">
				<label for="loginPassword">Password</label>
				<input type="password" class="form-control" id="loginPassword" name="loginPassword">
				</div>
			  <!--<div class="form-group">
						<label for="resetPasswordPassword2">Confirm New Password</label>
						<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
					  </div> -->
			  <button type="button" id="login" class="btn btn-primary"> Admin Login</button>
			 <!--  <a href="employee.php" class="btn btn-success">Employee Login</a> -->
			  
			  <button type="reset" class="btn">Clear</button>
			</form>
		  </div>
		</div>
		</div>
      </div>
    </div>
<?php
	require 'inc/footer.php';
?>
  </body>
</html>
