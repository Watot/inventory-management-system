	<!-- Navigation -->
<style>
  .navbar-brand {
    margin-left:-22%;
  }
  .logo {
    height: 3%;
    width: 3%;
    margin-left: 10%;
  }
  

</style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top" style="font-family:Arial Black">
    <img src= images/logo.png class= "logo">  
    <div class="container">
        
        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>"> SPI Inventory System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			<!-- <li class="nav-item">
				<form class="form-inline" action="/action_page.php">
					<input class="form-control col-md-8 mr-sm-2" type="text" placeholder="Search">
					<button class="btn btn-success" type="submit">Search</button>
				</form>
			</li> -->
			<li class="nav-item">
				<span class="nav-link">Welcome 	<?php echo $_SESSION['username']?></span>
            </li>
			<li class="nav-item">
				<span class="nav-link"> | </span>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="model/login/logout_emp.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>