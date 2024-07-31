<?php
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uname = $_POST['email'];
$pass = $_POST['pass'];

//Handling the Admin Login to Access UsersList.php 
if($uname == "admin@gmail.com" && $pass == "admin2024"){
        $_SESSION['adminloggedin'] = true;
        header('Location:usersList.php');
        exit();
    
}
//Handling the User Login to Access Dashboard.php

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiphp";

// Prepare and execute the SQL query to fetch the user details
$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT * FROM Employee WHERE email = ?");
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // Verify the password
    if ($user['Password']===$pass) {
        // Redirect to the desired page
        $_SESSION['userloggedin'] = $uname;
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid password
        header("Location: login.php?error");
        exit();
    }
} else {
    // Invalid email or user does not exist
    header("Location: login.php?error");
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();


?>