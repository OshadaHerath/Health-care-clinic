<?php
include 'connect.php';
session_start();

if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        header("location:login.php?Empty=PLEASE FILL IN THE BLANKS");
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

     
        if($role == 'Admin'){
            $admin_query = "SELECT * FROM adminlog WHERE username='$username' AND password='$password'";
            $admin_result = mysqli_query($conn, $admin_query);

            if($admin_row = mysqli_fetch_assoc($admin_result)){
                
                $_SESSION['ad_id'] = $admin_row['ad_id'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;
                header("location:admin.php");  
            } else {
                header("location:login.php?Invalid=INVALID ADMIN CREDENTIALS");
            }
        } else {
           
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
            $result = mysqli_query($conn, $query);

            if($row = mysqli_fetch_assoc($result)){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;

                if($role == 'Doctor'){
                    $doctor_query = "SELECT doc_name FROM doctors WHERE doc_un='$username'";
                    $doctor_result = mysqli_query($conn, $doctor_query);

                    if($doctor_row = mysqli_fetch_assoc($doctor_result)){
                        $_SESSION['doctor_name'] = $doctor_row['doc_name'];
                        header("location:doc.php");  
                    } else {
                        header("location:login.php?Invalid=INVALID DOCTOR USERNAME");
                    }
                } elseif($role == 'Patient'){
                    header("location:site.html");
                } elseif($role == 'Nurse'){
                    header("location:nurse.html");
                } elseif($role == 'Receptionist'){
                    header("location:recep.html");
                }
            } else {
                header("location:login.php?Invalid=Access denied");
            }
        }
    }
} else {
    echo "error";
}
mysqli_close($conn);
