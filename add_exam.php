<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Exam</title>
    <style>
        /* Background & body */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        /* Container */
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            width: 400px;
            max-width: 90vw;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 32px;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
            color: #e0e0e0;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            outline: none;
            transition: box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            box-shadow: 0 0 8px 3px #6c63ff;
            background: #fff;
        }

        input[type="submit"] {
            padding: 15px 20px;
            font-size: 18px;
            font-weight: 700;
            background: #6c63ff;
            border: none;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(108, 99, 255, 0.5);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: #564dcc;
            transform: scale(1.05);
        }

        p.success-message {
            margin-top: 25px;
            font-size: 16px;
            color: #a3f9a3;
            text-shadow: 0 0 8px #8ae88a;
        }

        @media (max-width: 450px) {
            .container {
                width: 90vw;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create New Exam</h2>

        <form method="POST" action="">
            <label for="exam_name">Exam Name:</label>
            <input type="text" id="exam_name" name="exam_name" required>

            <label for="no_of_questions">No. of Questions:</label>
            <input type="number" id="no_of_questions" name="no_of_questions" required>

            <label for="exam_subject">Subject:</label>
            <select id="exam_subject" name="exam_subject" required>
                <?php
                $subjects = $conn->query("SELECT * FROM subject");
                while ($row = $subjects->fetch_assoc()) {
                    echo "<option value='{$row['subject_name']}'>{$row['subject_name']}</option>";
                }
                ?>
            </select>

            

            <input type="submit" name="add_exam" value="Add Exam">
        </form>

        <?php
        if (isset($_POST['add_exam'])) {
            $name = $_POST['exam_name'];
            $questions = $_POST['no_of_questions'];
            $subject = $_POST['exam_subject'];
           

            $stmt = $conn->prepare("INSERT INTO examination (exam_name, no_of_questions, exam_subject) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $name, $questions, $subject);
            $stmt->execute();

            echo "<p class='success-message'>Exam added successfully!</p>";
        }
        ?>
<style>
    .back-button {
        display: inline-block;
        margin-top: 25px;
        padding: 10px 20px;
        background-color: white;
        color: #0072ff;
        font-weight: bold;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .back-button:hover {
        background-color: #0072ff;
        color: white;
    }
   </style>

    <div style="text-align:center;">
    <a href="admin_dashboard.php" class="back-button">⬅ Back to Admin Dashboard</a>
     </div>
    </div>
</body>
</html>
