<?php

session_start();
include 'layout/header.php';
include 'connection.php';

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $error=[];

    empty($email) ? $error[]="email is required" : "";
    empty($password) ? $error[]="password is required" : "";

    if(count($error)==0){
        $password=md5($password);

        $query="SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$query);

        if($result){
            if(mysqli_num_rows($result) > 0){

//            print_r($result);
                $user=mysqli_fetch_assoc($result);
//            print_r($user);
                $_SESSION['auth']=true;
                $_SESSION['username']=$user['name'];
                header("location: index.php");
            }else{
                $error[]="Username or password is invalid";
            }
        }else{
            mysqli_connect_error();
        }

    }
}

?>

<h1>Login Form</h1>
<form action="" method="post">
    <?php include "layout/error.php"; ?>
    <input type="email" name="email" id="" placeholder="Enter email" class="form-control my-2" />
    <input type="password" name="password" id="" placeholder="Enter password" class="form-control my-2" />
    <input type="submit" name="login" value="Login" id="" class="btn btn-success" />
</form>

<?php
include 'layout/footer.php';
?>
