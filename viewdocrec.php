<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
        table {
            background-color:white;
            width: 50%;
            border-collapse: collapse;
            
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    <script>
        function confirmDelete(drec_id) {
            if (confirm("Are you sure you want to delete this treatment?")) {
                window.location.href = "deletedtreat.php?drec_id=" + drec_id;
            }
        }
    </script>
    <script>
    window.onload = function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('deleted') === 'success') {
            alert('Patient treatment deleted successfully');
        }
    }
</script>
<script>
    window.onload = function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('updated') === 'success') {
            alert('Patient treatment updated successfully');
        }
    }
</script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="doc.php">Home page <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="docrec.php">Add a new Patient record <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<center>
    <h1>View patient records</h1><br><br>
    <table>
        <thead>
            <th>Patient ID</th>
            <th>Diagnoses</th>
            <th>Treatment</th>
        </thead>
        <?php
        include 'connect.php';

        $sql = "SELECT drec_id, patient_id, diagnoses, treatment FROM doc_rec";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $drec_id = $row['drec_id'];
                $patient_id = $row['patient_id'];
                $diagnoses = $row['diagnoses'];
                $treatment = $row['treatment'];

                echo '<tbody>
                    <tr>
                        <td>' . $patient_id . '</td>
                        <td>' . $diagnoses . '</td>
                        <td>' . $treatment . '</td>
                        <td><a href="updatedocrec.php?drec_id=' . $drec_id . '" class="btn btn-primary">Update</a></td>
                        <td><a href="javascript:confirmDelete(' . $drec_id . ')" class="btn btn-primary">Delete</a></td>
                    </tr>
                </tbody>';
            }
        }
        ?>
    </table>
</center>
</body>
</html>
