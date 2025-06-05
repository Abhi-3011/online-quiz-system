<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $contact = $_POST['student_contact'];

    $sql = "SELECT student_id FROM student WHERE student_name = ? AND student_contact = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $contact);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($student_id);
        $stmt->fetch();
        $_SESSION['student_id'] = $student_id;
        $_SESSION['student_name'] = $name;

        header("Location: dashboard.php"); // Redirect to student dashboard
        exit();
    } else {
        echo "<script>alert('❌ Invalid login credentials.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: student.php");
    exit();
}
?>
