<?php
	session_start();
	$dsn = 'mysql:host=localhost;dbname=shop_inventory';
	$user = 'root';
	$password = '';

	$username = $_SESSION['username'];
	
	// Establish the database connection
	try {
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		die("Connection failed: " . $e->getMessage());
	}
	$query = "INSERT INTO userlog (username, status) VALUES (:username, 1)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();
	
	unset($_SESSION['loggedIn']);
	unset($_SESSION['username']);
	session_destroy();
	header('Location: ../../login_emp.php');
	exit();
?>