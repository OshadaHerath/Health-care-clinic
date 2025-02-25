<?php
session_start();
include 'connect.php';

$id = $_SESSION['id'];


$query = "SELECT users.password, patients.phone_number FROM users
            LEFT JOIN patients ON users.id=patients.patient_id WHERE users.id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$password = $row['password'];
$phone_number = $row['phone_number'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];

   
    $update_users_query = "UPDATE users
                     SET password = '$password'
                     WHERE id = '$id'";
    mysqli_query($conn, $update_users_query);

    $update_patient_query = "UPDATE patients
                             SET phone_number = '$phone_number'
                             WHERE patient_id = '$id'";
    mysqli_query($conn, $update_patient_query);

    
    header("Location: viewinfo.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Update Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Your Information</h1>
        <form action="changeinfo.php" method="post">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo($password); ?>" >
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="<?php echo($phone_number); ?>" >
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
