<?php
include "layout/header.php";
include 'connection.php';

$id=$_GET['id'];
$query="SELECT * FROM student WHERE id='$id'";
$result=mysqli_query($conn,$query);
$student=mysqli_fetch_assoc($result);

if(isset($_POST['editStudent'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $photo = $_FILES['photo'];
    $date = $_POST['date'];
    $error = [];

    empty($name) ? $error[] = "name is required" : '';
    empty($email) ? $error[] = "email is required" : '';
    empty($date) ? $error[] = "date is required" : '';

    if (count($error) == 0) {
        if (is_uploaded_file($photo['tmp_name'])) {
            $photo_path = 'photo/'. $photo['name'];
            move_uploaded_file($photo['tmp_name'], $photo_path);
            $query = "UPDATE student SET name='$name', email='$email',photo='$photo_path',dob='$date' WHERE id='$id' ";
        } else {
            $query = "UPDATE student SET name='$name', email='$email',dob='$date' WHERE id='$id' ";
        }
        $result = mysqli_query($conn, $query);
        if($result){
            header("location:student-index.php");
        }else {
            echo mysqli_connect_error();
        }
    }
}
?>

    <h1>Edit Student</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <?php include 'layout/error.php'; ?>
        <input type="text" name="name" id="" placeholder="Enter Student Name" class="form-control my-2" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $student['name'] ?>" />
        <input type="email" name="email" id="" placeholder="Enter Student Email" class="form-control my-2" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $student['email'] ?>" />
        <input type="file" name="photo" id="" class="form-control my-2" />
        <img src="<?php echo $student['photo'] ?>" alt="" width="200">
        <input type="date" name="date" id="" class="form-control my-2" value="<?php echo isset($_POST['date']) ? $_POST['date'] : $student['dob'] ?>" />
        <input type="submit" name="editStudent" id="" value="New Student" class="btn btn-outline-primary">

    </form>

<?php include "layout/footer.php"; ?>