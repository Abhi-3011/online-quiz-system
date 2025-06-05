<?php
include 'db.php';

$question_ids = $_POST['question_ids'];
$answers = $_POST['answers'];
$score = 0;

foreach ($question_ids as $qid) {
    $user_ans = isset($answers[$qid]) ? intval($answers[$qid]) : 0;

    $sql = "SELECT correct_option FROM question WHERE id = $qid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($user_ans === intval($row['correct_option'])) {
        $score++;
    }
}

$total = count($question_ids);
echo "<h2>Your Score: $score / $total</h2>";
?>
