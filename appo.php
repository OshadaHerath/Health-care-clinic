<!doctype html>
<html lang="en">
<head>
    <title>Appointments</title>
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
<body>
    <center>
        <h1>Appointments</h1><br><br>

        <?php
        include 'connect.php';

        $ap_id = '';
        $patient_id = '';
        $doc_name = '';
        $date = '';
        $time = '';

        if (isset($_GET['ap_id'])) {
            
            $ap_id = $_GET['ap_id'];
            $sql = "SELECT * FROM appointment WHERE ap_id='$ap_id'";
            $result = mysqli_query($conn, $sql);
            $appointment = mysqli_fetch_assoc($result);

            $patient_id = $appointment['patient_id'];
            $doc_name = $appointment['doc_name'];
            $date = $appointment['date'];
            $time = $appointment['time'];
        }

        if (isset($_POST['submit'])) {
            
            $patient_id = $_POST['patient_id'];
            $doc_name = $_POST['doc_name'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $sql = "UPDATE appointment SET patient_id='$patient_id', doc_name='$doc_name', date='$date', time='$time' WHERE ap_id='$ap_id'";

            $run = mysqli_query($conn, $sql);
            if ($run) {
                header("Location: view2.php?updated=success"); 
            } else {
                echo "Please check your query.";
            }
        }
        ?>

        <form action="appo.php?ap_id=<?php echo $ap_id; ?>" method="post">
            <input type="hidden" name="ap_id" value="<?php echo $ap_id; ?>">
            <input type="text" name="patient_id" placeholder="Enter Patient ID" value="<?php echo $patient_id; ?>"><br><br>
            <select name="doc_name">
                <option value="Dr. Samuel Lawson" <?php if ($doc_name == 'Dr. Samuel Lawson') echo 'selected'; ?>>Dr. Samuel Lawson</option>
                <option value="Dr. Amelia Wright" <?php if ($doc_name == 'Dr. Amelia Wright') echo 'selected'; ?>>Dr. Amelia Wright</option>
                <option value="Dr. Thomas Bennett" <?php if ($doc_name == 'Dr. Thomas Bennett') echo 'selected'; ?>>Dr. Thomas Bennett</option>
                <option value="Dr. Evelyn Carter" <?php if ($doc_name == 'Dr. Evelyn Carter') echo 'selected'; ?>>Dr. Evelyn Carter</option>
                <option value="Dr. Henry Mitchell" <?php if ($doc_name == 'Dr. Henry Mitchell') echo 'selected'; ?>>Dr. Henry Mitchell</option>
            </select><br><br>
            <input type="date" name="date" value="<?php echo $date; ?>"><br><br>
            <input type="time" name="time" value="<?php echo $time; ?>"><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </center>
</body>
</html>