<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role'] != 'Doctor'){
    header("location:login.php?Invalid=PLEASE LOG IN FIRST");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Doctor Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
      .logout {
          position: absolute;
          top:20px;
          right:20px;
          opacity: 100;
      }

      html, body {
    height: 100%;
    margin: 0;
}

body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
    background-image: url('doct.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    
    min-height: 100vh; 
}

      h1{
        color:black;
      }
      .logout {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .logout .nav-link {
            background-color: #dc3545; 
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-align: center;
        }

        .logout .nav-link:hover {
            background-color: #c82333; 
        }

        .navbar-nav .nav-item:not(.logout) .nav-link:hover {
            background-color: #0056b3; 
            color: white;
            border-radius: 5px;
        }
  </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Doctor Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="docrec.php">Add Medical Information</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="viewdocrec.php">View Medical Information</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="viewdocappoint.php">View Upcoming Appointment Information</a>
                </li>
                <li class="logout">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
    </nav>

 
        <h1>Welcome <?php echo $_SESSION['doctor_name']; ?></h1>
    
    
  </body>
</html>
