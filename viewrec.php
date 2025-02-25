<!doctype html>
<html lang="en">
<head>
    <title>records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
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
<body>
    <center>
        <h1>Update patient records</h1><br><br>

        <?php
        include 'connect.php';

        $nrec_id = '';
        $patient_id = '';
        $vitals = '';
        $notes = '';

        if (isset($_GET['nrec_id'])) {
            $nrec_id = $_GET['nrec_id'];
            $sql = "SELECT * FROM nurse_rec WHERE nrec_id='$nrec_id'";
            $result = mysqli_query($conn, $sql);
            $nurse_rec = mysqli_fetch_assoc($result);

            $patient_id = $nurse_rec['patient_id'];
            $vitals = $nurse_rec['vitals'];
            $notes = $nurse_rec['notes'];
        }

        if (isset($_POST['submit'])) {
            $patient_id = $_POST['patient_id'];
            $vitals = $_POST['vitals'];
            $notes = $_POST['notes'];

            $sql = "UPDATE nurse_rec SET patient_id='$patient_id', vitals='$vitals', notes='$notes' WHERE nrec_id='$nrec_id'";

            $run = mysqli_query($conn, $sql);
            if ($run) {
                header("Location: viewpatientrec.php?updated=success"); 
                exit(); 
            } else {
                echo "Please check your query.";
            }
        }
        ?>

        <form action="viewrec.php?nrec_id=<?php echo $nrec_id; ?>" method="post">
            <input type="hidden" name="nrec_id" value="<?php echo $nrec_id; ?>">
            <input type="text" name="patient_id" placeholder="Enter Patient ID" value="<?php echo $patient_id; ?>"><br><br>
            <input type="text" name="vitals" placeholder="Enter vitals" value="<?php echo $vitals; ?>"><br><br>
            <input type="text" name="notes" placeholder="Add notes" value="<?php echo $notes; ?>"><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </center>
</body>
</html>
