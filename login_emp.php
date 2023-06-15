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
    $query = "SELECT password FROM employee WHERE username = :username";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();

    // Fetch the row
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Verify the password
    if ($row && verifyPassword($password, $row['password'])) {
        // Password is correct, login successful
        // echo "Login successful!";
        $query = "INSERT INTO userlog (username, status) VALUES (:username, 0)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;

        // Perform any additional actions or redirect the user
    } else {
        // Invalid username or password
        // echo "Invalid username or password!";
        echo '<script>alert("Invalid username or password!");</script>';

    }
}
?>

 <html>
<head>
  <title>Login Page</title>
  <link rel="manifest" href="manifest.json">
    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
        .then(function(registration) {
            console.log('Service Worker registered with scope:', registration.scope);
        }).catch(function(error) {
            console.log('Service Worker registration failed:', error);
        });
    }
    </script>
  <style>
    body {
      background-image: url("images/bg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      /* min-height: 100vh; */
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      background-color: white;
      width: 600px;
    }

    .card-header {
      background-color: #0000;
      margin-top:10px;
      color: white;
      font-weight: bold;
      text-align: center;
    }

    .card-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
    }

    .btn-primary {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
}

.btn-success {
  background-color: #28a745;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
}

.btn {
  margin-right: 5px;
  border: none;
  padding: 10px 20px;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
}
    .label {
  font-weight: bold;
}

.form-control {
  width: 100%;
  padding: 10px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

  </style>
</head>
<body>
  <div class="container" style="font-family:Arial Black">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header" style="background-color: #0000">
              <img src="images/gclogo.png" style="height:100px">
              <img src="images/logo.png" style="height:100px">
           
          </div>
          <div class="card-body">
          <center>Login</center>
            <form action="" method="POST">
              <div id="loginMessage"></div>
              <div class="form-group">
                <label for="loginUsername">Username</label> <br>
                <input type="text" name="username" class="form-control" id="loginUsername" placeholder="username">
              </div>
              <div class="form-group">
                <label for="loginPassword">Password</label><br>
                <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password">
              </div>
             <!-- <button type="submit" id="login" name="submit" class="btn btn-primary">Admin Login</button> -->
              <!-- <button name= "btnlogin" class="btn btn-success" type="submit">Employee Login </button> -->
              <input type="submit" class="btn btn-success" style="width:100%;" name="submit" value="Login">
              <!-- <button type="reset" class="btn">Clear</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!-- <script>
  $(document).ready(function(){
    end_loader();
  })
</script> -->
