<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve table data from the form
$tableData = $_POST["tableData"];
$tableData = json_decode($tableData, true);

// Prepare and execute SQL statement to insert data into the database
$stmt = $conn->prepare("INSERT INTO item (itemNumber, itemName, discount, stock, unitPrice, description) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters and execute the statement for each row of data
foreach ($tableData as $row) {
    $itemnumber = $row[0];
    $item = $row[1];
    $discount = $row[2];
    $quantity = $row[3];
    $price = $row[4] ?? '';
    $description = $row[5] ;
  $stmt->bind_param("ssssss",$itemnumber, $item, $discount, $quantity, $price, $description);
  $stmt->execute();
}

// Close the statement and database connection
$stmt->close();
$conn->close();

// Redirect back to the form page or display a success message
header("Location: index.php");
exit();
?>
