<?php
include 'db.php';

session_start();
$student_id = $_SESSION['student_id'];  // Or however you're tracking login
$exam_id = $_POST['exam_id'];           // Comes from form hidden input

$correct_answers = 0;
$total_questions = count($_POST['answers']); // Assuming each question has an 'answers[question_id]' in form

foreach ($_POST['answers'] as $question_id => $selected_option) {
    $query = "SELECT correct_option FROM question WHERE id = $question_id";
    $res = $conn->query($query);
    $row = $res->fetch_assoc();

    if ($row['correct_option'] == $selected_option) {
        $correct_answers++;
    }
}

// Example: grade logic
$grade = ($correct_answers / $total_questions) * 100;
if ($grade >= 90) $grade_letter = 'A';
elseif ($grade >= 75) $grade_letter = 'B';
elseif ($grade >= 50) $grade_letter = 'C';
else $grade_letter = 'F';

// Insert result into result table
$conn->query("INSERT INTO result (student_id, exam_id, grade_obtained) VALUES ($student_id, $exam_id, '$grade_letter')");

// ✅ Now redirect to result display page:
header("Location: show_result.php?student_id=$student_id&exam_id=$exam_id");
exit();
?>
