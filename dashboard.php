<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="img/icon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Dashboard</title>
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
  <a class="navbar-brand" href="index.html" style="display: flex; align-items: center;">
    <img src="img/16.png" alt="Logo" width="150px" height="50px">
    <!-- <h1 style="color: wheat; margin-left: 10px;">TASK</h1> -->
  </a>
  <h3 class="sublogo">- Your Ultimate Notes and Task Management Solution -</h3>
<div class="navbar">
  <a href="index.html">Home</a>
  <a href="register.php">Register</a>
  <form action="../logout.php" method="POST">
    <button type="submit" class="btnLogin-popup">Logout</button>
     </form>
</div>
</header>
<div style="margin-top: 150px;" class="container-md text-center " style="max-width: 850px;">
        <div class="mb-2 hero-text">Welcome</div>

        <div style="justify-content: center;" class="row">
          
          
            <a class="col-4 dash-card card p-3 rounded-5" style="width: 18rem;" href="notes/index.php">
            <img src="img/31.png" class="card-img-top" alt="..."/>
            <h3 class="dash-card-text">Notes</h3>
            </a>
            &ensp;
            <a class="col-4 dash-card card p-3 rounded-5" style="width: 18rem;" href="tasks/index.php">
            <img src="img/33.png" class="card-img-top" alt="..."/>
            <h3 class="dash-card-text">Tasks</h3>
            </a>
            
          
      </div>
    </div>

   

    
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

    </body>
    </html>