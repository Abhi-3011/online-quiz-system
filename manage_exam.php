<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Exams</title>
</head>
<body>
    <h2>All Exams</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>No. of Questions</th>
            <th>Subject</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM examination");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['exam_id']}</td>
                <td>{$row['exam_name']}</td>
                <td>{$row['no_of_questions']}</td>
                <td>{$row['exam_subject']}</td>
                <td>{$row['website_url']}</td>
                <td>
                    <a href='edit_exam.php?id={$row['exam_id']}'>Edit</a> |
                    <a href='delete_exam.php?id={$row['exam_id']}' onclick=\"return confirm('Delete this exam?')\">Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
