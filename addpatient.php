<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'Receptionist') {
    header("location:login.php?Invalid=PLEASE LOG IN FIRST");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Add New Patient</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            color: rgb(255, 255, 255);
            font-size: 36px;
            margin-top: 40px;
            margin-bottom: 30px;
        }

        form {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            padding: 30px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<div class="container">
    <center>
        <h1>Add New Patient</h1><br><br>
        <form action="addpatient.php" method="post">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="text" name="password" placeholder="Password" required><br><br>
            <select name="role" required><br><br>
                <option value="Patient">Patient</option>
            </select><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $sql = "INSERT INTO users(username, password, role) VALUES ('$username', '$password', '$role')";

            $run = mysqli_query($conn, $sql);

            if ($run) {
                header("location:patientdetails.html");
            } else {
                echo "Please check your queries";
            }
        }
        ?>
    </center>
</div>

</body>
</html>
