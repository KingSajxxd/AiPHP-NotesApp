<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the itemId parameter from the POST request
    $itemId = $_POST['itemId'];

    // Connect to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aiphp";
    $status="1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the current status of the item
    $stmt = $conn->prepare("SELECT Status FROM Item WHERE ItemId = ?");
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    // Determine the new status based on the current status
    $newStatus = $currentStatus == '0' ? '1' : '0';



    

    // Update the status of the item
    $stmt = $conn->prepare("UPDATE Item SET Status = ? WHERE ItemId = ?");
    $stmt->bind_param("si", $newStatus, $itemId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo "Item status updated successfully";
    } else {
        echo "Error updating item status: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>