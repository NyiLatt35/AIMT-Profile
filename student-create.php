<?php
include "layout/header.php";
include 'connection.php';

if(isset($_POST['newStudent'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $photo=$_FILES['photo'];
    $date=$_POST['date'];
    $error=[];

    $name=='' ? $error[]="name is required" : '';
    $email=='' ? $error[]="email is required" : '';
    !is_uploaded_file($photo['tmp_name']) ? $error[]="photo is required" : '';
    $date=='' ? $error[]="date is required" : '';

    if(count($error)==0){
        $photo_path="photo/".$photo['name'];
        move_uploaded_file($photo['tmp_name'],$photo_path);

        $query="INSERT INTO student (name,email,photo,dob) VALUES ('$name','$email','$photo_path','$date')";
        $result=mysqli_query($conn,$query);

        if($result){
            header("location: student-index.php");
        }else{
            echo mysqli_connect_error();
        }
    }

}
?>

<h1>New Student</h1>
<form action="" method="post" enctype="multipart/form-data">

    <?php include 'layout/error.php'; ?>
    <input type="text" name="name" id="" placeholder="Enter Student Name" class="form-control my-2" />
    <input type="email" name="email" id="" placeholder="Enter Student Email" class="form-control my-2" />
    <input type="file" name="photo" id="" class="form-control my-2" />
    <input type="date" name="date" id="" class="form-control my-2" />
    <input type="submit" name="newStudent" id="" value="Add New Student" class="btn btn-outline-primary">

</form>

<?php include "layout/footer.php"; ?>