<!doctype html>
<html lang="en">
<head>
    <title>Records</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="doc.php">Home page <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
        </div>
    </nav>
    <style>
        html, body {
        height: 100%;
        margin: 0;
        }

        body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        background-image: url('allback2.jpg');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh; 
        
        }
        h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
            color:black;
          
            
        }

        form {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-color:black;
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
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

    <center><br><br><br>
        <h1>Add patient records</h1><br>
        <form action="docrec.php" method="post">
            <input type="number" name="patient_id" placeholder="Patient ID" required><br>
            <input type="text" name="diagnoses" placeholder="Diagnoses" required><br>
            <input type="text" name="treatment" placeholder="Enter treatment plan" required><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </center>

    <?php
    include 'connect.php';

    if (isset($_POST['submit'])) {
        $patient_id = $_POST['patient_id'];
        $diagnoses = $_POST['diagnoses'];
        $treatment = $_POST['treatment'];

        $sql = "INSERT INTO doc_rec(patient_id, diagnoses, treatment) VALUES ('$patient_id', '$diagnoses', '$treatment')";

        $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($run) {
            header("Location: viewdocrec.php");
        } else {
            echo "Please check your queries";
        }
    }
    ?>
</body>
</html>
