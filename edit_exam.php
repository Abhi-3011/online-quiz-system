<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM examination WHERE exam_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Edit Exam</title></head>
<body>
<h2>Edit Exam</h2>

<form method="POST">
    Name: <input type="text" name="exam_name" value="<?= $data['exam_name'] ?>" required><br><br>
    No. of Questions: <input type="number" name="no_of_questions" value="<?= $data['no_of_questions'] ?>" required><br><br>
    Subject: <input type="text" name="exam_subject" value="<?= $data['exam_subject'] ?>" required><br><br>
    Website: <input type="text" name="website_url" value="<?= $data['website_url'] ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE examination SET exam_name=?, no_of_questions=?, exam_subject=?, website_url=? WHERE exam_id=?");
    $stmt->bind_param("sissi", $_POST['exam_name'], $_POST['no_of_questions'], $_POST['exam_subject'], $_POST['website_url'], $id);
    $stmt->execute();
    echo "<p style='color:green;'>Updated successfully. <a href='manage_exam.php'>Go back</a></p>";
}
?>
</body>
</html>
