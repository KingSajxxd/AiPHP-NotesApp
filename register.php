<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="img/icon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
  <body class="home" id="registerhome">
    <header>
        <a class="navbar-brand" href="index.html" style="display: flex; align-items: center;">
            <img src="img/16.png" alt="Logo" width="150px" height="50px">
          </a>
          <h3 class="sublogo">- Your Ultimate Notes and Task Management Solution -</h3>
      <div class="navbar">
          <a href="index.html">Home</a>
          <a href="register.php">Register</a>
          <a href="login.php">Login</a>
          
      </div>
      </header>
      <div class="container-md" style="max-width: 500px; margin-top: 150px; height: 120vh;">
        <h1 class="logo" style="text-align: center;">Let's get registered!</h1>
        <form action="dbregister.php" method="POST">
            <div class="input-group">
                <input type="email" class="emailadd" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email Address" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="input-group">
                <input type="text" class="fname" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <input type="text" class="lname" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <input type="text" class="fone" id="phone" name="phone" placeholder="Phone" required>
            </div>
            <div class="input-group">
                <input type="text" class="sal" id="salary" name="salary" placeholder="Salary" required>
            </div>
            <div class="input-group">
                <input type="date" class="date" id="dob" name="dateOfBirth" placeholder="Date Of Birth" required>
            </div>
            <div class="radio-group">
                <div class="form-check form-check-inline">
                    <input class="gmale" type="radio" name="gender" id="male" value="m" checked>
                    <label class="gendermale" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="famle" type="radio" name="gender" id="female" value="f">
                    <label class="genderfemale" for="female">Female</label>
                </div>
            </div>
            <button type="submit" class="btn-primary">Register</button>
            <div class="d-inline-block signUp-link" style="margin-left: 25px;">
                <p>Already a member? <a href="login.php"
                class="signUpBtn-link">Login Now!</a></p>
            </div>
        </form>
        <?php

        if(isset($_GET['error'])) {
          echo('
           <div id="alertbox" class="alert alert-danger mt-3" role="alert">
              User with this email already exists
          </div>');
        }
        
        ?>
    </div>
    <footer>
        <p>&copy; 2024 powered by Sajjad. All Rights Reserved.</p>
      </footer>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        ScrollReveal({
          reset: true,
          distance:'60px',
          duration: 300,
          delay: 400
        })
        ScrollReveal().reveal('.container-md', {delay: 250, origin: 'left'});

        function hideAlertBox() {
        const alertBox = document.getElementById("alertbox");
        alertBox.style.display = "none";
      }
       </script>
    </body>
</html>
