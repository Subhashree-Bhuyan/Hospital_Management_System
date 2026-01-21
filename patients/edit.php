<?php
include('../config/db.php');
if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = $_GET['id'];


$result = mysqli_query($con, "SELECT * FROM patients WHERE patient_id = $id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $disease = $_POST['disease'];

    $query = "UPDATE patients SET name ='$name', age = '$age', gender = '$gender', phone = '$phone', disease = '$disease' WHERE patient_id = $id";
    
    mysqli_query($con, $query);
    header("Location: ../patients/view.php");
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
    <h2>Edit Patient</h2>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $data['patient_id']; ?>">
        <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br><br>
        <input type="number" name="age" value="<?php echo $data['age']; ?>" required><br><br>
        <input type="text" name="gender" value="<?php echo $data['gender']; ?>" required><br><br>
        <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required><br><br>
        <input type="text" name="disease" value="<?php echo $data['disease']; ?>" required><br><br>


        <button name="update">Add Patient</button>
    </form>
</body>
</html>