<?php

$email = $_POST["email"];
$password = $_POST["psw"];
$verifypassword = $_POST["psw-repeat"];
$remember = $_POST["remember"];


$host = "localhost";
$dbname = "signupConnection";
$username = "root";
$password = "xx";

mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection error:" . mysqli_connect_errno());
}

echo "Connection Successful.";


// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $email);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();

?>