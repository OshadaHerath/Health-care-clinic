<?php 
$conn=new mysqli('localhost','root','', 'healthcli');

if($conn){
    echo "";
}else{
    die(mysqli_error($conn));
}
?>