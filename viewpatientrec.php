<!doctype html>
<html lang="en">
  <head>
    <title>View patient records</title>
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
            width: 50%;
            border-collapse: collapse;
            background-color:white;
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
        window.onload = function() {
            const params = new URLSearchParams(window.location.search);
            if (params.get('updated') === 'success') {
                alert('Patient record updated successfully');
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
                <a class="nav-link" href="nurse.html">Home page <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="addpatientrec.php">Add a new Patient record <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<center>
    <h1>View patient records</h1><br><br>
    <table>
        <thead>
            <th>Patient ID</th>
            <th>Vitals</th>
            <th>Notes</th>
        </thead>
        <?php
        include 'connect.php';

        $sql = "SELECT nrec_id, patient_id, vitals, notes FROM nurse_rec";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $nrec_id = $row['nrec_id'];
                $patient_id = $row['patient_id'];
                $vitals = $row['vitals'];
                $notes = $row['notes'];

                echo '<tbody>
                    <tr>
                        <td>' . $patient_id . '</td>
                        <td>' . $vitals . '</td>
                        <td>' . $notes . '</td>
                        <td><a href="viewrec.php?nrec_id=' . $nrec_id . '" class="btn btn-primary">Update</a></td>
                    </tr>
                </tbody>';
            }
        }
        ?>
    </table>
</center>
</body>
</html>
