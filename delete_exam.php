
<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM examination WHERE exam_id = $id");
header("Location: manage_exam.php");
?>
