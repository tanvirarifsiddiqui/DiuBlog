<?php
// Get form data
$name = $_POST['name'];
$headline = $_POST['headline'];
$post = $_POST['post'];
$category = $_POST['category'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diublog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL statement
$sql = "INSERT INTO blogpost (name, headline, post, category) VALUES ('$name','$headline', '$post', '$category')";

if ($conn->query($sql) === TRUE) {
  echo "Blog post saved successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
