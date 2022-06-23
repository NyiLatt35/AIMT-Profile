<?php
include 'connection.php';

$id=$_GET['id'];

$query="DELETE FROM student WHERE id='$id'";
$result=mysqli_query($conn,$query);
if($result){
    header("location: student-index.php");
}else{
    echo mysqli_connect_error();
}