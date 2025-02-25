<?php
include 'connect.php';

if(isset($_GET['drec_id'])){
    $drec_id=$_GET['drec_id'];

    $sql= "UPDATE doc_rec SET treatment='' WHERE drec_id='$drec_id'";
    if(mysqli_query($conn,$sql)){
        header("location:viewdocrec.php?deleted=success");
    }else{echo "Error" . mysqli_error($conn);
    }
}
?> 