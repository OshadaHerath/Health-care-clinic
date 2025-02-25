<?php

include 'connect.php';

if($_POST['submit']){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $sql= "insert into users(id,username,password,role) values ('$id', '$username','$password','$role')";

    $run= mysqli_query ($conn,$sql) or die (mysqli_error);
    if($run){
        header("location:addpatient.html");
    }else{
            echo "please check your queries";
        }
    }
    ?>
