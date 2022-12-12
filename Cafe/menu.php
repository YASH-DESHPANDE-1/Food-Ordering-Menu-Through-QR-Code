<?php

$f_name = $_POST["fname"];
$l_name = $_POST["lname"];
$mob_no = $_POST["mob"];
$po_1 = $_POST["po"];

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'user_db');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_details (first_name, last_name, mob, payment)
VALUES ('$f_name', '$l_name', $mob_no, '$po_1')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>