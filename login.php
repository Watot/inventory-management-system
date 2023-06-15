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
	// session_start();
	
	
	// // Check if user is already logged in
	// if(isset($_SESSION['loggedIn'])){
	// 	header('Location: index.php');
	// 	exit();
	// }
	
	require_once('inc/config/constants.php');
	require_once('inc/config/db.php');
	require_once('inc/header.html');
?>
<?php
session_start();
// Database connection configuration
$dsn = 'mysql:host=localhost;dbname=shop_inventory';
$username = 'root';
$password = '';

// Establish the database connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to securely hash the password
function hashPassword($password) {
    return md5($password);
}

// Function to verify the hashed password
function verifyPassword($password, $hashedPassword) {
    return md5($password) === $hashedPassword;
}

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch the hashed password for the given username
    $query = "SELECT password FROM user WHERE username = :username";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();

    // Fetch the row
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Verify the password
    if ($row && verifyPassword($password, $row['password'])) {
        // Password is correct, login successful
        // echo "Login successful!";
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;

        // Perform any additional actions or redirect the user
    } else {
        // Invalid username or password
        // echo "Invalid username or password!";
        echo '<script>alert("Invalid username or password!");</script>';

    }
}
?>
<link rel="manifest" href="admin-manifest.json">
    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('admin-service-worker.js')
        .then(function(registration) {
            console.log('Service Worker registered with scope:', registration.scope);
        }).catch(function(error) {
            console.log('Service Worker registration failed:', error);
        });
    }
    </script>
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
		  <form action="" method="POST">
			<div id="loginMessage"></div>
			  <div class="form-group">
				<label for="loginUsername">Username</label>
				<input type="text" class="form-control" id="loginUsername" name="username">
			  </div>
			  <div class="form-group">
				<label for="loginPassword">Password</label>
				<input type="password" class="form-control" id="loginPassword" name="password">
				</div>
			  <!--<div class="form-group">
						<label for="resetPasswordPassword2">Confirm New Password</label>
						<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
					  </div> -->
			<input type="submit" class="btn btn-success" style="" name="submit" value="Login">
			  <!-- <button type="button" id="login" class="btn btn-primary"> Admin Login</button> -->
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
