<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $address = $_POST['student_address'];
    $contact = $_POST['student_contact'];
    $qualification = $_POST['student_qualification'];

    $sql = "INSERT INTO student (student_name, student_address, student_contact, student_qualification)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $address, $contact, $qualification);
    
    if ($stmt->execute()) {
        echo "<script>alert('✅ Student registered successfully! Please login.'); window.location.href='student.php';</script>";
    } else {
        echo "<script>alert('❌ Registration failed: " . addslashes($conn->error) . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: student.php");
    exit();
}
?>
