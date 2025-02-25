<?php

include 'connect.php';

if($_POST['submit']){
    $patient_id=$_POST['patient_id'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $DOB=$_POST['DOB'];
    $address=$_POST['address'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $medical_history=$_POST['medical_history'];
    $insurance_details=$_POST['insurance_details'];

    $sql= "insert into patients(patient_id,first_name,last_name,DOB,address,phone_number,email,medical_history,insurance_details) values 
    ('$patient_id', '$first_name','$last_name','$DOB','$address','$phone_number','$email','$medical_history','$insurance_details')";

    $run= mysqli_query ($conn,$sql) or die (mysqli_error);
    if($run){
        header("location:viewpatient.php");
    }else{
            echo "please check your queries";
        }
    }
    ?>