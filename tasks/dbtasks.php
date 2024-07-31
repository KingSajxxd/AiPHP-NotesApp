
<?php
    session_start();
    if(!isset($_SESSION['userloggedin'])) {
        header('Location: ../login.php');
        exit();
    }
?>

<?php
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aiphp";

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $listname = $_POST['listname'];
        $caption = $_POST['caption'];
        $email=$_SESSION['userloggedin'];

        

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO TaskList (ListName,Caption,email) VALUES (?, ?,?)");
        $stmt->bind_param("sss", $listname, $caption,$email);

        if ($stmt->execute()) {
            header('Location:index.php?inserted');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }


    //Check if a delete request is made
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "DELETE FROM TaskList WHERE ListName = '".$delid."'";
        if($conn->query($sql) === TRUE){
            header('Location:index.php?deleted');
            exit();
        };
        $conn->close();
    }

    
    
?>