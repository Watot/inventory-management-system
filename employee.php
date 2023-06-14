<script>
    start_loader()

    require_once('inc/header.html');
  </script>
 <html>
<head>
  <title>Login Page</title>
  <style>
    body {
      background-image: url("images/bg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      background-color: white;
      width: 120%;
    }

    .card-header {
      background-color: #0000;
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
      <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="card">
          <div class="card-header" style="background-color: #0000">
            <center>
              <img src="images/gclogo.png" style="width: 20%; height:12%;">
              <img src="images/logo.png" style="width: 40%; height:15%;">
            </center>
            Login
          </div>
          <div class="card-body">
            <form action="home.php" method="POST">
              <div id="loginMessage"></div>
              <div class="form-group">
                <label for="loginUsername">Username</label> <br>
                <input type="text" name="username" class="form-control" id="loginUsername" placeholder="username">
              </div>
              <div class="form-group">
                <label for="loginPassword">Password</label><br>
                <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password">
              </div>
              <button type="submit" id="login" name="submit" class="btn btn-primary">Admin Login</button>
              <a href="employee.php" class="btn btn-success">Employee Login</a>
              <button type="reset" class="btn">Clear</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
