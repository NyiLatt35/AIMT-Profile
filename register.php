<?php

include "layout/header.php";
include "connection.php";

if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
    $error=[];

//    if(empty($name)){
//        $error[]='name is required';
//    }

    empty($name) ? $error[]="name is required" : "";
    empty($email) ? $error[]="email is required" : "";
    empty($password) ? $error[]="password is required" : "";
    empty($c_password) ? $error[]="confirm password is required" : "";
    $password!=$c_password ? $error[]="password do not match" : "";

    $password=md5($password);

    if(count($error)==0){
        $query = "INSERT INTO user (name,email,password) VALUES ('$name','$email','$password')";

        $result = mysqli_query($conn,$query);
        if($result){
            header("location: index.php");
        }else{
            echo mysqli_connect_error();
        }
    }
}
?>

<h1>Register Form</h1>
<form action="" method="post">
    <?php include 'layout/error.php'?>
    <input type="text" name="name" id="" class="form-control my-2" placeholder="Enter name" />
    <input type="email" name="email" id="" class="form-control my-2" placeholder="Enter email" />
    <input type="password" name="password" id="" class="form-control my-2" placeholder="Enter password" />
    <input type="password" name="c_password" id="" class="form-control my-2" placeholder="Enter confirm password" />
    <input type="submit" name="register" id="" value="Register" class="btn btn-primary" />
</form>

<?php
include "layout/footer.php";
?>
