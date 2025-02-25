<!doctype html>
<html lang="en">
<head>
    <title>Your Upcoming Appointments</title>
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
        h2{
            color:white;
        }
        table {
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
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="doc.php">Home page <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav><br>

<center>
    <?php
    include 'connect.php';
    session_start();

    if ($_SESSION['role'] == 'Doctor') {
        $doc_un = $_SESSION['username'];

        $query = "SELECT doc_name FROM doctors WHERE doc_un = '$doc_un'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $doc_name = $row['doc_name'];

        $query = "SELECT patient_id, date, time FROM appointment WHERE doc_name = '$doc_name'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Your Upcoming Appointments</h2>";
            echo "<table id='appointmentTable' class='display'>";
            echo "<thead><tr><th>Patient ID</th><th>Date</th><th>Time</th></tr></thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['patient_id'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td></tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<h2>You don't have any upcoming appointments</h2>";
        }
    } else {
        echo "Access denied!";
    }

    mysqli_close($conn);
    ?>
</center>

<!-- jQuery, DataTables, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
        var table = new DataTable('#appointmentTable', {
            dom: 'Bfrtip',
            buttons: [
                'copy', 
                {
                    extend: 'csv',
                    text: 'CSV',
                    action: function(e, dt, button, config) {
                
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                        alert('Report generated successfully');
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    action: function(e, dt, button, config) {
                      
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
                        alert('Report generated successfully');
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    action: function(e, dt, button, config) {
                        
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                        alert('Report generated successfully');
                    }
                },
                'print' 
            ]
        });
    });
</script>
</body>
</html>
