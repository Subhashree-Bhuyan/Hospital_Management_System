<?php
include("../config/db.php");
$result = mysqli_query($con, "SELECT * FROM patients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Patient List</h2>
    <table border='1' cellpadding='10'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Disease</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['patient_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['disease']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['patient_id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['patient_id'] ?>" onclick = "return confirm('Are you sure you want to delete <?php echo $row['name'] ?> record?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <a href="add.php" class="btn">Add New Patient</a>
    <a href="../dashboard.php" class="btn">Back</a>
</body>
</html>



