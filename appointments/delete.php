<?php
include('../config/db.php');

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = intval($_GET['id']); // basic safety

mysqli_query($con, "DELETE FROM appointments WHERE id = $id");

header("Location: view.php");
exit;
?>
