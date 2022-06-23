<?php
include "layout/header.php";
include "connection.php";

$query="SELECT * FROM student";
$result=mysqli_query($conn,$query);

//print_r(mysqli_fetch_assoc($result));
//echo "<br/>";
//print_r(mysqli_fetch_assoc($result));

//foreach ($result as $student){
//    print_r($student);
//    echo "<br/>";
//}

?>

<h1>All Students</h1>
<a href="student-create.php">New Student</a>

<table class="table">
    <tbody>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td>
                <img src="<?php echo $student['photo']; ?>" alt="userphoto" width="100" />
            </td>
            <td><?php echo $student['dob']; ?></td>
            <td>
                <a href="student-edit.php?id=<?php echo $student['id']; ?>">Edit</a>
                <a href="student-delete.php?id=<?php echo $student['id']; ?>">Delete</a>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include "layout/footer.php"; ?>