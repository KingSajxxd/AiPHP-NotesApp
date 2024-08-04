<?php
    session_start();
    if(!isset($_SESSION['userloggedin'])) {
        header('Location: ../login.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="image/png" href="../img/icon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
    

    .btnLogin-popup {
    width: 130px;
    height: 50px;
    background: wheat;
    border: 2px wheat;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1em;
    color: black;    ;
    font-weight: 500;
    margin-left: 40px;
    transition: .5s ease;

}
.btnLogin-popup:hover {
    background: red;
    color: black;
}
    </style>
</head>

<body class="home" id="registerhome">
    <header>
        <a class="navbar-brand" href="../index.html" style="display: flex; align-items: center;">
            <img src="../img/16.png" alt="Logo" width="150px" height="50px">
          </a>
          <h3 class="sublogo"></h3>
      <div class="navbar">
          <a href="../index.html">Home</a>
          <a href="../register.php">Register</a>
          <form action="../logout.php" method="POST">
    <button type="submit" class="btnLogin-popup">Logout</button>
     </form>
          </div>
      </header>

      <div style="margin-top: 150px;" class="container-md text-center " style="max-width: 850px;">
      <div class="mb-2 hero-text">Tasks App</div>
        <form action="dbtasks.php" method="POST" class="row g-3">
            <div class="col-4">
                <input type="text" class="form-control" id="title" name="listname" placeholder="List Name" required/>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="description" name="caption" placeholder="Caption" required></input>
            </div>
            <div class="col-1">
            <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg></button>
            
            </div>

            <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>

</button>
            </div>
        </form>
<!-- Modal -->
<div class="modal fade " id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <form action="" method="GET">
          
        <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Spotlight Search" aria-label="Spotlight Search" aria-describedby="basic-addon2">
            <button class="input-group-text" id="basic-addon2" type="submit">Search</button>
        </div>
                
        </form>
      </div>
    </div>
  </div>
  </div>

<!-- Modal Ends -->
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Date Created</th> 
                    <th>List Name</th>
                    <th>Caption</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the MySQL database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aiphp";
                $email=$_SESSION['userloggedin'];

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //Check if a search request is made
                if(isset($_GET['search'])){
                    $search=$_GET['search'];
                    if($search==''){
                        //All the records
                        $sql = "SELECT ListName,Caption,CreatedDate FROM TaskList WHERE email = '$email' ORDER BY CreatedDate DESC";
                    }
                    $sql = "SELECT ListName,Caption,CreatedDate FROM TaskList WHERE email = '$email' AND ListName LIKE '%$search%' ORDER BY CreatedDate DESC";
                }else{
                    // SQL query to select the desired columns from the "Employee" table
                    $sql = "SELECT ListName,Caption,CreatedDate FROM TaskList WHERE email = '$email' ORDER BY CreatedDate DESC";
                }


                // Execute the query
                $result = $conn->query($sql);

                // Check if the query was successful
                if ($result) {
                    // Fetch the rows
                    while ($row = $result->fetch_assoc()) {
                        $lname=$row["ListName"];
                        $cdate=$row["CreatedDate"];
                        // Display the data in table rows
                        echo "<tr>";
                        echo "<td class='p-3'>" . $row["CreatedDate"] . "</td>";
                        echo "<td class='p-3'><a href='../items/index.php?listname=" . $lname . "&cdate=" . $cdate . "'>" . $lname . "</a></td>";
                        echo "<td class='p-3'>" . $row["Caption"] . "</td>";
                        echo "<td class='p-3'> <a class='btn btn-outline-danger' href=" . "dbtasks.php?delid=" . $row["ListName"] . ">X</a> </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>

    </div>
   




    <footer>
    <p>&copy; 2024 powered by Sajjad. All Rights Reserved.</p>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>