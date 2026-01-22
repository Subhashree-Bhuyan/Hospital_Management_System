<?php
include('../config/db.php');

// $result = mysqli_query($con, "SELECT * FROM doctors");

$search = "";
if(isset($_GET['search']) && $_GET['search'] != ""){
    $search = $_GET['search'];
    $q = "SELECT * FROM  doctors WHERE name LIKE '%$search%'";
}else {
    $q = "SELECT * FROM doctors";
}
$result = mysqli_query($con, $q);
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
    <div class="page">
        <h2>Doctor List</h2>

        <form class="search_box" method="get">
            <input type="text" name="search" placeholder="Search Doctor by name">
            <button type="submit">Search</button>
        </form>

        <div class="btns">
            <a href="add.php" class="other_btn">Add New Doctor</a>
            <a href="../dashboard.php" class="back">Back</a>
        </div>

        <table border='5' cellpadding = '10'>
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
                <a class="edit" href="edit.php?id=<?php echo $row['doctor_id']; ?>">Edit</a>
                <a class="delete" href="delete.php?id=<?php echo $row['doctor_id']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['name'] ?> record?'">Delete</a>
            </td>
        </tr>
        <?php } ?>
        </table>

        
    </div>
</body>
</html>