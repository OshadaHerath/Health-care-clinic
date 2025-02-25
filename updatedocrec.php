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
<body>
    <br><br><br><br><br><br>
    <center>
        <h1>Update patient records</h1><br><br>

        <?php
        include 'connect.php';

        $drec_id = '';
        $patient_id = '';
        $diagnoses = '';
        $treatment = '';
        

        if (isset($_GET['drec_id'])) {
            
            $drec_id = $_GET['drec_id'];
            $sql = "SELECT * FROM doc_rec WHERE drec_id='$drec_id'";
            $result = mysqli_query($conn, $sql);
            $doc_rec = mysqli_fetch_assoc($result);

            
             $patient_id = $doc_rec['patient_id'];
             $diagnoses = $doc_rec['diagnoses'];
             $treatment = $doc_rec['treatment'];
            
        }
        

        if (isset($_POST['submit'])) {
            
            $patient_id = $_POST['patient_id'];
            $diagnoses = $_POST['diagnoses'];
            $treatment = $_POST['treatment'];
            

            $sql = "UPDATE doc_rec SET patient_id='$patient_id', diagnoses='$diagnoses', treatment='$treatment' WHERE drec_id='$drec_id' ";

            $run = mysqli_query($conn, $sql);
            if ($run) {
                header("Location: viewdocrec.php?updated=success"); 
            } else {
                echo "Please check your query.";
            }
        }
        ?>

        <form action="updatedocrec.php?drec_id=<?php echo $drec_id; ?>" method="post">
            <input type="hidden" name="drec_id" value="<?php echo $drec_id; ?>">
            <input type="text" name="patient_id"  value="<?php echo $patient_id; ?>"><br><br>
            <input type="text" name="diagnoses" rows="2" cols="50" value="<?php echo $diagnoses; ?>"><br><br>
            <input type="text" name="treatment" rows="4" cols="50" value="<?php echo $treatment; ?>"><br><br>
            <input type="submit" value="Submit" name="submit">
            
            
        </form>
    </center>
</body>
</html>

