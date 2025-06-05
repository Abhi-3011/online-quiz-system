<?php
include 'db.php';

$subject_code = $_POST['subject_code'];
$subject_name = $_POST['subject_name'];

$sql = "INSERT INTO subject (subject_code, subject_name) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $subject_code, $subject_name);

if ($stmt->execute()) {
    echo "✅ Subject added successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}
?>
