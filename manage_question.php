<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head><title>Manage Questions</title></head>
<body>
<h2>All Questions</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Text</th>
        <th>Correct</th>
        <th>Subject</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM question");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['question_text']}</td>
            <td>{$row['correct_option']}</td>
            <td>{$row['subject_code']}</td>
            <td>
                <a href='edit_question.php?id={$row['id']}'>Edit</a> |
                <a href='delete_question.php?id={$row['id']}' onclick=\"return confirm('Delete this question?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>
</body>
</html>
