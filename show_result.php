<?php
include 'db.php';

$student_id = $_GET['student_id'];
$exam_id = $_GET['exam_id'];

// Fetch result details
$sql = "
SELECT 
    s.student_name,
    e.exam_name,
    r.grade_obtained,
    r.certificate_no
FROM 
    result r
JOIN student s ON r.student_id = s.student_id
JOIN examination e ON r.exam_id = e.exam_id
WHERE r.student_id = $student_id AND r.exam_id = $exam_id
";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<h3>No result found for this exam!</h3>";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam Result</title>
</head>
<body>
    <h2>🎓 Exam Result</h2>
    <p><strong>Student Name:</strong> <?php echo $row['student_name']; ?></p>
    <p><strong>Exam:</strong> <?php echo $row['exam_name']; ?></p>
    <p><strong>Grade:</strong> <?php echo $row['grade_obtained']; ?></p>
    <p><strong>Certificate Number:</strong> <?php echo $row['certificate_no']; ?></p>

    <br>
    <a href="student_dashboard.php"><button>Back to Dashboard</button></a>
</body>
</html>
