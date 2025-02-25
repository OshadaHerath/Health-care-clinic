<!doctype html>
<html lang="en">
  <head>
    <title>Add Patient Records</title>
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
      input[type="text"] {
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
                    <a class="nav-link" href="nurse.html">Home page <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
        </div>
    </nav>
    <center><br>
      <h1>Add patient records</h1>
      <form action="addpatientrec.php" method="post">
        <input type="number" name="patient_id" placeholder="Patient ID"><br>
        <input type="text" name="vitals" placeholder="Vital signs"><br>
        <input type="text" name="notes" placeholder="Notes"><br>
        <input type="submit" value="Submit" name="submit">
      </form>
    </center>

    <?php
    include 'connect.php';

    if(isset($_POST['submit'])){
        $nrec_id = $_POST['nrec_id'];
        $patient_id = $_POST['patient_id'];
        $vitals = $_POST['vitals'];
        $notes = $_POST['notes'];

        $sql = "INSERT INTO nurse_rec(nrec_id, patient_id, vitals, notes) VALUES ('$nrec_id', '$patient_id', '$vitals', '$notes')";
        $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($run){
            header("location:viewpatientrec.php");
        } else {
            echo "Please check your queries.";
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQ
