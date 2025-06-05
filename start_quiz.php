<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['exam_id'])) {
    $_SESSION['exam_id'] = $_POST['exam_id'];
    header("Location: quiz.php");
    exit();
} else {
    echo "❌ Invalid request.";
}
