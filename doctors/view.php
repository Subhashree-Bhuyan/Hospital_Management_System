<?php
include('../config/db.php');

$result = mysqli_query($con, "SELECT * FROM doctors");
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
    <h2>Doctor List</h2>

    <form method="post">
        <table border='1' cellpadding = '10'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Available Days</th>
                <th>Acion</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['doctor_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['available_days']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['doctor_id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['doctor_id']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['name'] ?> record?'">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </form>

    <a href="add.php" class="btn">Add New Doctor</a>
    <a href="../dashboard.php" class="btn">Back</a>
</body>
</html>