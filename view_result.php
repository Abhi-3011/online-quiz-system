<?php
session_start();
include 'db.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: login_student.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'] ?? '';

// Fetch results
$sql = "
    SELECT 
        r.certificate_no,
        e.exam_name,
        e.exam_subject,
        r.grade_obtained
    FROM 
        result r
    JOIN examination e ON r.exam_id = e.exam_id
    WHERE r.student_id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result</title>
    <style>
        body {
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .result-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 90%;
            max-width: 700px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 26px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            color: #fff;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: rgba(255, 255, 255, 0.2);
        }

        a.button {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background: #ffffff;
            color: #2193b0;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s ease;
        }

        a.button:hover {
            background: #2193b0;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h2><?php echo htmlspecialchars($student_name); ?> Exam Results</h2>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Certificate No</th>
                    <th>Exam Name</th>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['certificate_no']; ?></td>
                    <td><?php echo htmlspecialchars($row['exam_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['exam_subject']); ?></td>
                    <td><?php echo htmlspecialchars($row['grade_obtained']); ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No results found for you yet.</p>
        <?php endif; ?>

        <a class="button" href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
