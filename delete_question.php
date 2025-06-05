<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM question WHERE id = $id");
header("Location: manage_question.php");
?>
