<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['id']) || $_SESSION['role'] != 'Patient'){
    header("location:login.php?Invalid=PLEASE LOG IN FIRST");
    exit();
}

$patient_id = $_SESSION['id']; 

$query = "SELECT diagnoses, treatment FROM doc_rec WHERE patient_id='$patient_id'";

$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">
<head>
    <title>My Medical </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
            font-family: Arial, sans-serif;
            background-image: url('appointment.jpg');
            background-size: cover;
            background-position:relative;
            background-repeat: no-repeat;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff; 
            font-weight: bold;
        }

        .table {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border-radius: 8px; 
        }

        .table th {
            background-color: #007bff; 
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1; 
        }

       
        .table tbody tr td[colspan="3"] {
            text-align: center;
            color: #dc3545; 
            font-style: italic;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="site.html">Home page <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>My medical details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Diagnoses</th>
                    <th>Treatment</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                                <td>{$row['diagnoses']}</td>
                                <td>{$row['treatment']}</td>
                                
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No medical records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>