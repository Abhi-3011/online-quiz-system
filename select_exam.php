<?php
session_start();
include 'db.php';

// Make sure student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login_student.html");
    exit();
}

$sql = "SELECT exam_id, exam_name, exam_subject FROM examination";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Exam</title>
</head>
<body>
    <h2>Select an Exam to Start</h2>

    <?php if ($result->num_rows > 0): ?>
        <form action="start_quiz.php" method="POST">
            <label for="exam">Choose Exam:</label>
            <select name="exam_id" required>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['exam_id']; ?>">
                        <?php echo $row['exam_name'] . " (" . $row['exam_subject'] . ")"; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br><br>
            <input type="submit" value="Start Quiz">
        </form>
    <?php else: ?>
        <p>No exams available right now.</p>
    <?php endif; ?>

</body>
</html>
