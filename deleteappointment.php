<?php
include 'connect.php';

if(isset($_GET['ap_id'])){
    $ap_id=$_GET['ap_id'];

    $sql= "DELETE FROM appointment WHERE ap_id='$ap_id'";
    if(mysqli_query($conn,$sql)){
        header("location:view2.php?deleted=success");
    }else{echo "Error" . mysqli_error($conn);
    }
}
?> 