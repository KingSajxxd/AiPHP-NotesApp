<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiphp";


// Generate a random password
function generatePassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
}

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " );
}

// Retrieve data submitted by the form
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$salary = $_POST['salary'];
$dateOfBirth = $_POST['dateOfBirth'];
$password = generatePassword();

// Prepare and execute the SQL query to insert the data into the Employee table
$sql = "INSERT INTO Employee (email, firstName, lastName, gender, phone, salary, dateOfBirth, password) VALUES ('$email', '$firstName', '$lastName', '$gender', '$phone', '$salary', '$dateOfBirth', '$password')";

try {
    if ($conn->query($sql) === TRUE) {
        header('Location:login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        header('Location:register.php?error');
        exit();

    } else {
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$conn->close();

?>