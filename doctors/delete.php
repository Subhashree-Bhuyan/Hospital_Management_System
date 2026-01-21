<?php
include('../config/db.php');

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM doctors WHERE doctor_id = $id");

header("Location: view.php");
?>