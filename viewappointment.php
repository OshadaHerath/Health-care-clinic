<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'Patient') {
    header("location:login.php?Invalid=PLEASE LOG IN FIRST");
    exit();
}

$patient_id = $_SESSION['id'];


$query = "SELECT appointment.doc_name, appointment.date, appointment.time, doc_cost.cost 
          FROM appointment 
          JOIN doc_cost ON appointment.doc_name = doc_cost.doc_name 
          WHERE appointment.patient_id='$patient_id'";
$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">
<head>
    <title>My Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css">

    <style>
        body {
            background-color: #f8f9fa; 
            font-family: Arial, sans-serif;
            background-image: url('appointment.jpg');
            background-size: cover;
            background-position: relative;
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

        .table tbody tr td[colspan="4"] {
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
        <h1>Your Appointments</h1>
        <table id="appointmentTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['doc_name']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['time']}</td>
                                <td>\${$row['cost']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No appointments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>

    <!-- DataTables Initialization -->
    <script>
        new DataTable('#appointmentTable', {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    </script>
</body>
</html>
