<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Edit Student</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $data['course'] ?>"><br><br>
    <button type="submit">Update</button>
</form>