<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM question WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Edit Question</title></head>
<body>
<h2>Edit Question</h2>

<form method="POST">
    Text: <textarea name="question_text" required><?= $data['question_text'] ?></textarea><br><br>
    Option1: <input type="text" name="option1" value="<?= $data['option1'] ?>" required><br>
    Option2: <input type="text" name="option2" value="<?= $data['option2'] ?>" required><br>
    Option3: <input type="text" name="option3" value="<?= $data['option3'] ?>" required><br>
    Option4: <input type="text" name="option4" value="<?= $data['option4'] ?>" required><br>
    Correct Option: <input type="number" name="correct_option" value="<?= $data['correct_option'] ?>" min="1" max="4" required><br>
    Subject Code: <input type="text" name="subject_code" value="<?= $data['subject_code'] ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE question SET question_text=?, option1=?, option2=?, option3=?, option4=?, correct_option=?, subject_code=? WHERE id=?");
    $stmt->bind_param("sssssssi", $_POST['question_text'], $_POST['option1'], $_POST['option2'], $_POST['option3'], $_POST['option4'], $_POST['correct_option'], $_POST['subject_code'], $id);
    $stmt->execute();
    echo "<p style='color:green;'>Updated successfully. <a href='manage_question.php'>Go back</a></p>";
}
?>
</body>
</html>
