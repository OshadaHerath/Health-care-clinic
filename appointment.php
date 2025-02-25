<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['id']) || $_SESSION['role'] != 'Receptionist'){
    header("location:login.php?Invalid=PLEASE LOG IN FIRST");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Make New Appointment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      html, body {
        height: 100%;
        margin: 0;
        }

        body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        background-image: url('allback.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh; 
        }

      h1 {
        margin-bottom: 20px;
        color:white;
      }

      form {
        max-width: 500px;
        margin: auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      input[type="number"],
      input[type="date"],
      input[type="time"],
      select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ced4da;
        border-radius: 4px;
      }

      input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      input[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="recep.html">Home page <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
        </div>
    </nav>
    <center><br>
      <h1>Make new appointment</h1>
      <form action="appointment.php" method="post">
        <input type="number" name="patient_id" placeholder="Enter patient ID"><br>
        <select name="doc_name">
            <option value="Dr. Samuel Lawson">Dr. Samuel Lawson</option>
            <option value="Dr. Amelia Wright">Dr. Amelia Wright</option>
            <option value="Dr. Thomas Bennett">Dr. Thomas Bennett</option>
            <option value="Dr. Evelyn Carter">Dr. Evelyn Carter</option>
            <option value="Dr. Henry Mitchell">Dr. Henry Mitchell</option>
        </select><br>
        <input type="date" name="date" placeholder="Enter date"><br>
        <input type="time" name="time" placeholder="Enter time"><br>
        <input type="submit" value="Submit" name="submit">
      </form>
    </center>

    <?php
    if(isset($_POST['submit'])){
        $ap_id = $_POST['ap_id'];
        $patient_id = $_POST['patient_id'];
        $doc_name = $_POST['doc_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $sql = "INSERT INTO appointment(ap_id, patient_id, doc_name, date, time) VALUES ('$ap_id', '$patient_id', '$doc_name', '$date', '$time')";
        $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($run){
            header("location:view2.php");
        } else {
            echo "Please check your queries.";
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
