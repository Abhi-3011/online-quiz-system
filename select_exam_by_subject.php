<?php
session_start();
include 'db.php';

// Retrieve subject from POST or session
$subject = $_POST['subject'] ?? $_SESSION['selected_subject'] ?? null;

if (!$subject) {
    header("Location: exam_list.php");
    exit();
}

// Store subject in session
$_SESSION['selected_subject'] = $subject;
$student_id = $_SESSION['student_id'] ?? null;

// Fetch exams for selected subject
$sql = "SELECT exam_id, exam_name FROM examination WHERE exam_subject = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Exams</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding: 60px 20px;
        color: #fff;
        animation: fadeIn 1.5s ease;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        font-size: 36px;
        margin-bottom: 40px;
        text-align: center;
        text-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
        animation: fadeIn 1s ease;
    }

    .exam-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 25px 30px;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 400px;
        transition: transform 0.3s ease;
    }

    .exam-card:hover {
        transform: scale(1.03);
    }

    .exam-card form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .exam-card input[type="submit"] {
        padding: 12px 30px;
        font-size: 18px;
        font-weight: bold;
        color: #764ba2;
        background-color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .exam-card input[type="submit"]:hover {
        background-color: #764ba2;
        color: #fff;
    }

    .back-button {
        margin-top: 40px;
        padding: 12px 28px;
        background-color: #fff;
        color: #667eea;
        font-weight: bold;
        font-size: 16px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background-color: #667eea;
        color: #fff;
    }

    @media (max-width: 600px) {
        h2 {
            font-size: 26px;
        }

        .exam-card {
            width: 90%;
        }

        .back-button {
            width: 90%;
        }
    }
</style>

</head>
<body>

<h2>Exam: <?php echo htmlspecialchars($subject); ?></h2>

<?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="exam-card">
            <form action="start_quiz.php" method="POST">
                <input type="hidden" name="exam_id" value="<?php echo $row['exam_id']; ?>">
                <input type="submit" value="Start: <?php echo htmlspecialchars($row['exam_name']); ?>">
            </form>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No exams found for this subject.</p>
<?php endif; ?>

<button class="back-button" onclick="window.location.href='exam_list.php'">⬅ Back to Subject Options</button>

</body>
</html>
