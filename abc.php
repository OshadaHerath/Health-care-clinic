<!doctype html>
<html lang="en">
<head>
    <title>records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <center>
        <h1>Update patient records</h1><br><br>

        <?php
        include 'connect.php';

        $drec_id = '';
        $patient_id = '';
        $diagnoses = '';
        $treatment = '';
        

        if (isset($_GET['id'])) {
            
            $drec_id = $_GET['id'];
            $sql = "SELECT users.password, patients.phone_number FROM users
            LEFT JOIN patients ON users.id=patients.patient_id WHERE users.id='$id'";
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
                header("Location: viewdocrec.php"); 
            } else {
                echo "Please check your query.";
            }
        }
        ?>

        <form action="updatedocrec.php?drec_id=<?php echo $drec_id; ?>" method="post">
            <input type="hidden" name="drec_id" value="<?php echo $drec_id; ?>">
            <input type="text" name="patient_id" placeholder="Enter Patient ID" value="<?php echo $patient_id; ?>"><br><br>
            <input type="text" name="diagnoses"placeholder="Enter diagnoses" value="<?php echo $diagnoses; ?>"><br><br>
            <input type="text" name="treatment" placeholder="Enter treatment" value="<?php echo $treatment; ?>"><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </center>
</body>
</html>

