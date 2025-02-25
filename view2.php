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
    <title>Appointment List</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css">
    
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

        h1{
            color:white;
        }
        #appointmentTable {
            background-color:white;
            width: 80% !important;
            border-collapse: collapse;
            margin-top: 20px;
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
        function confirmDelete(ap_id) {
            if (confirm("Are you sure you want to delete this appointment?")) {
                window.location.href = "deleteappointment.php?ap_id=" + ap_id;
            }
        }
    </script>
     <script>
    window.onload = function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('deleted') === 'success') {
            alert('Appointment deleted successfully');
        }
    }
</script>
<script>
    window.onload = function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get('updated') === 'success') {
            alert('Appointment updated successfully');
        }
    }
    </script>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="recep.html">Home page <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="appointment.php">Make an Appointment <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
     
    </nav>
<br><br>

    <center>
    <h1>Appointment details</h1><br><br>
        <table id="appointmentTable" class="display">
            <thead>
                <th>Appointment ID</th>
                <th>Patient ID</th>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT ap_id, patient_id, doc_name, date, time FROM appointment";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $ap_id = $row['ap_id'];
                    $patient_id = $row['patient_id'];
                    $doc_name = $row['doc_name'];
                    $date = $row['date'];
                    $time = $row['time'];

                    echo '<tr>
                            <td>' . $ap_id . '</td>
                            <td>' . $patient_id . '</td>
                            <td>' . $doc_name . '</td>
                            <td>' . $date . '</td>
                            <td>' . $time . '</td>
                            <td>
                                <a href="appo.php?ap_id=' . $ap_id . '" class="btn btn-primary">Update</a>
                                <a href="javascript:confirmDelete(' . $ap_id . ')" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </center>

    <!-- jQuery, DataTables, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>
    
    
    <script>
        new DataTable('#appointmentTable', {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    </script>
  </body>
</html>
