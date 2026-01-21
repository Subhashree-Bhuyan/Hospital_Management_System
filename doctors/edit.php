<?php
include('../config/db.php');

$id = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM doctors WHERE doctor_id=$id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $department = $_POST['department'];
    $available_days = $_POST['available_days'];

    $query = "UPDATE doctors SET name='$name', department='$department', available_days='$available_days' WHERE doctor_id = $id";
    mysqli_query($con, $query);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Doctor</h2>

    <form method="post">
        <input type="text" name="name" value="<?php echo $data['name'];?>" required> <br><br>
        <input type="text" name="department" value="<?php echo $data['department'];?>" required> <br><br>
        <input type="text" name="available_days" value="<?php echo $data['available_days'];?>" required> <br><br>

        <button name="update">Update Doctor</button>
    </form>
</body>
</html>