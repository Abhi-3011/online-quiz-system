<?php
session_start();
include 'db.php';

if (!isset($_SESSION['exam_id']) || !isset($_SESSION['student_id'])) {
    header("Location: dashboard.php");
    exit();
}

$exam_id = $_SESSION['exam_id'];
$student_id = $_SESSION['student_id'];

// Fetch subject of the selected exam
$sql_exam = "SELECT exam_subject FROM examination WHERE exam_id = ?";
$stmt_exam = $conn->prepare($sql_exam);
$stmt_exam->bind_param("i", $exam_id);
$stmt_exam->execute();
$result_exam = $stmt_exam->get_result();
$subject_row = $result_exam->fetch_assoc();
$subject = $subject_row['exam_subject'];

// Get subject code using subject name
$sql_code = "SELECT subject_code FROM subject WHERE subject_name = ?";
$stmt_code = $conn->prepare($sql_code);
$stmt_code->bind_param("s", $subject);
$stmt_code->execute();
$result_code = $stmt_code->get_result();
$subject_row = $result_code->fetch_assoc();
$subject_code = $subject_row['subject_code'] ?? '';

if (!$subject_code) {
    echo "No subject code found.";
    exit();
}

// Get questions for that subject
$sql = "SELECT * FROM question WHERE subject_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $subject_code);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title><style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        color: #333;
    }

    h2 {
        font-size: 32px;
        margin-bottom: 30px;
        color: #fff;
        text-shadow: 1px 1px 6px rgba(0,0,0,0.3);
    }

    form {
        background: rgba(255, 255, 255, 0.9);
        padding: 30px 25px;
        border-radius: 16px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 800px;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .question-block {
        padding: 15px 20px;
        background-color: #fff;
        border-left: 5px solid #f78ca0;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .question-block p {
        margin: 0 0 10px;
        font-weight: bold;
    }

    .question-block label {
        display: block;
        margin: 5px 0;
        cursor: pointer;
    }

    input[type="radio"] {
        margin-right: 8px;
        transform: scale(1.1);
    }

    input[type="submit"] {
        align-self: center;
        padding: 14px 30px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        background-color: #ff6a88;
        color: white;
        cursor: pointer;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #d63a5f;
    }

    @media (max-width: 600px) {
        h2 {
            font-size: 24px;
            text-align: center;
        }

        form {
            padding: 20px;
        }

        input[type="submit"] {
            width: 100%;
        }
    }
</style>

</head>
<body>
    <h2>Quiz: <?php echo htmlspecialchars($subject); ?></h2>

    <form action="subject_quiz.php" method="POST">
        <?php $qno = 1; ?>
        <?php while ($row = $result->fetch_assoc()): ?>
    <div class="question-block">
        <p><?php echo $qno++ . ". " . htmlspecialchars($row['question_text']); ?></p>
        <label><input type="radio" name="answer[<?php echo $row['id']; ?>]" value="1" required> <?php echo htmlspecialchars($row['option1']); ?></label>
        <label><input type="radio" name="answer[<?php echo $row['id']; ?>]" value="2"> <?php echo htmlspecialchars($row['option2']); ?></label>
        <label><input type="radio" name="answer[<?php echo $row['id']; ?>]" value="3"> <?php echo htmlspecialchars($row['option3']); ?></label>
        <label><input type="radio" name="answer[<?php echo $row['id']; ?>]" value="4"> <?php echo htmlspecialchars($row['option4']); ?></label>
    </div>
<?php endwhile; ?>


        <input type="submit" value="Submit Quiz">
    </form>
</body>
</html>
