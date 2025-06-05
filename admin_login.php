<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['admin_name'];
    $pwd = $_POST['password'];

    $sql = "SELECT admin_id FROM admin WHERE admin_name = ? AND PASSWORD = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $pwd);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($admin_id);
        $stmt->fetch();
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $name;

        header("Location: admin_dashboard.php"); // Redirect to student dashboard
        exit();
    } else {
        echo "<script>alert('❌ Invalid login credentials.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: home.php");
    exit();
}
?>