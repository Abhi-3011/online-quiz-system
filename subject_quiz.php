<?php
session_start();
include 'db.php';

//if (!isset($_SESSION['exam_id']) || !isset($_SESSION['student_id'])) {
  //  header("Location: dashboard.php");
  //  exit();
//}

$exam_id = $_SESSION['exam_id'];
$student_id = $_SESSION['student_id'];
$answers = $_POST['answer'] ?? [];

$total = 0;
$correct = 0;

if (!empty($answers)) {
    // Securely fetch only expected question IDs
    $question_ids = array_map('intval', array_keys($answers));
    $placeholders = implode(',', array_fill(0, count($question_ids), '?'));

    $types = str_repeat('i', count($question_ids));
    $stmt = $conn->prepare("SELECT id, correct_option FROM question WHERE id IN ($placeholders)");
    $stmt->bind_param($types, ...$question_ids);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $qid = $row['id'];
        $correct_option = $row['correct_option'];

        if (isset($answers[$qid]) && $answers[$qid] == $correct_option) {
            $correct++;
        }
        $total++;
    }
}

$percentage = $total > 0 ? ($correct / $total) * 100 : 0;
$grade = '';

if ($percentage >= 90) $grade = "A+";
elseif ($percentage >= 80) $grade = "A";
elseif ($percentage >= 70) $grade = "B";
elseif ($percentage >= 60) $grade = "C";
else $grade = "F";

// Save result
$stmt = $conn->prepare("INSERT INTO result (student_id, exam_id, grade_obtained) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $student_id, $exam_id, $grade);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Result</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #8e2de2, #4a00e0);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .result-box {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px 50px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        strong {
            font-size: 22px;
            color: #ffe600;
        }

        button {
            margin-top: 25px;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            background-color: white;
            color: #4a00e0;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: #4a00e0;
            color: white;
        }

        @media (max-width: 600px) {
            .result-box {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            p, strong {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h2>🎉 Quiz Completed!</h2>
        <p>Total Questions: <?php echo $total; ?></p>
        <p>Correct Answers: <?php echo $correct; ?></p>
        <p>Percentage: <?php echo round($percentage, 2); ?>%</p>
        <p>Grade: <strong><?php echo $grade; ?></strong></p>
        <button onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
    </div>
</body>
</html>
